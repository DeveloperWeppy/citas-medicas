<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Client;
use App\Models\Service;
use App\Models\Convenio;
use App\Models\PlanServices;
use App\Models\ServicesFree;
use App\Models\ServiceFreeClient;
use App\Models\Subscription;
use Illuminate\Http\Request;
use App\Models\CategoryService;
use App\Models\RedeemedService;
use Illuminate\Support\Facades\DB;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use Illuminate\Support\Facades\Auth;
use App\Models\DiagnosticRedeemedService;
use App\Models\UserInformation;

class RedeemedServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.redimidos.index');
    }

    public function index_client()
    {
        return view('cliente.misredimidos.index');
    }

    public function index_diagnostico($id)
    {
        $id_service_redeemed = $id;
        return view('admin.redimidos.diagnostico')->with('id_service_redeemed', $id_service_redeemed);
    }

    public function getRedimidos()
    {
        $data = array();
        $redimidos = RedeemedService::get();
        foreach ($redimidos as $key => $value) {

            $id_service = $value->service_id;
            $service = Service::find($id_service);

            $id_category = $service->category_id;
            $category = CategoryService::find($id_category);

            $name_category = $category->name;

            $ruta_diagnosticar = route('redimidos.index_diagnostico', $value->id);
            if($value->is_free==1){
              $is_free="Si";
            }else{
              $is_free="No";
            }
            $info = [
                $value->id,
                $value->find($value->id)->nombre_cliente->name,
                $value->find($value->id)->nombre_cliente->number_identication,
                $value->find($value->id)->nombre_servicio->name,
                $is_free,
                date_format($value->created_at, "Y-m-d,  g:i a"),
            ];

            if ($name_category == "Salud") {
                $info[] = '<a href="' . $ruta_diagnosticar . '" class="btn btn-block bg-gradient-secondary btn-xs"><i class="fas fa-edit"></i> Registrar Diagnóstico</a>';
            } else {
                $info[] = 'No Aplica';
            }
            $data[] = $info;
        }

        echo json_encode([
            'data' => $data
        ]);
    }

    public function getMisRedimidos()
    {
        $user_login = Auth::user()->id;
        $client = Client::where('user_id',$user_login)->first();
        $id_client = $client->id;

        $data = array();
        $redimidos = RedeemedService::where('client_id', $id_client)->get();

        foreach ($redimidos as $key => $value) {

            $servicio = Service::find($value->service_id);
            $valor_normal = self::convertirVa($servicio->price_normal);
            $valor_discount = $servicio->price_normal;
            $porcentaje_descuento = $servicio->percentage_discount;

            $valor = 0;

            if ($valor_discount != null && $porcentaje_descuento == null) {
                $valor = self::convertirVa($value->valor_discount);
            } else if ($value->valor_discount == null && $porcentaje_descuento != null) {
                $valor = $porcentaje_descuento . '%';
            }
            $info = [
                $value->id,
                $value->find($value->id)->nombre_servicio->name,
                $valor_normal,
                $valor,
                $value->find($value->id)->nombre_prestador_servicio->name,
                date_format($value->created_at, "Y-m-d,  g:i a"),
            ];

            $data[] = $info;
        }

        echo json_encode([
            'data' => $data
        ]);
    }

    public function getDiagnostics()
    {
        try {
            $codes_cie10 = DB::select(
                'SELECT id, clave, descripcion FROM diagnosticoscie10'
            );
            $response = ['data' => $codes_cie10];
        } catch (\Exception $exception) {
            return response()->json(['message' => 'There was an error retrieving the records'], 500);
        }
        return response()->json($response);
    }

    public function search(Request $request)
    {
        $data = trim($request->valor);
        $result = DB::table('clients')
            ->where('name', 'like', '%' . $data . '%')
            ->orwhere('number_identication', 'like', '%' . $data . '%')
            ->limit(5)
            ->get();
        return response()->json([
            "estado" => 1,
            "result" => $result
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function redimir($id)
    {
        $consultar_user = Client::where('user_id', $id)->get();
        if(count($consultar_user)>0){
            $dato =$this->validarSuscripcionClienteUsuario($id);
            if ($dato['status_subscription']) {
                $subscrito = 'si';
            } else {
                $subscrito = 'no';
            }
        }else{
           $consultar_user[0]->name="";
           $consultar_user[0]->id=0;
        }
        //dd($dato);
        return view('admin.redimidos.redimir')->with('subscrito', $subscrito)
           ->with('name_client', $consultar_user[0]->name)->with('client_id', $consultar_user[0]->id)->with('user_id', $id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $error = false;
        $mensaje = '';

        $id_cliente = $request->id_client;
        $id_prestador = $request->prestador_id;
        $id_service = $request->id_service;

        $register_redeem_service = array(
            'prestador_id' => $id_prestador,
            'client_id' => $id_cliente,
            'service_id' => $id_service,
        );

        //get data client
        /** ============================================ */
        $cliente = Client::find($id_cliente);
        $nombre_client = $cliente->name;

        $user_client_id = $cliente->user_id;

        //get data account user
        $user_client = User::find($user_client_id);
        $email = $user_client->email;
        /** ============================================ */

        //get service redeemed
        $service = Service::find($id_service);
        $name_service = $service->name;

        //get data service provider
        $prestador = UserInformation::find($id_prestador);
        $name_prestador = $prestador->name;
        $subscription = Subscription::where('user_id', $user_client_id)->orderBy('next_payment', 'desc')->get();
        $convenio = Convenio::where('responsable_id',  $id_prestador)->get(['id']);
        $servicesFree = ServicesFree::where([ 'plan_id' => $subscription[0]->plan_id,'service_id' => $id_service,'convenio_id' => $convenio[0]->id])->get();
        $ifFree=0;
        if(count($servicesFree)>0){
              $serviceFreeClient = ServiceFreeClient::where(['id_cliente' =>$id_cliente,'id_service' => $id_service])->get();
              $date = Carbon::parse($subscription[0]->created_at);
              $fechaAct = $date->addDay($servicesFree[0]->duration_in_days);
              if($fechaAct >= now()->toDateString()){
                  if(count($serviceFreeClient)>0 && $servicesFree[0]->cantidad_redimido>0){
                       if($servicesFree[0]->cantidad_redimido>$serviceFreeClient[0]->cantidad_veces_redimir){
                             $cantidad=$serviceFreeClient[0]->cantidad_veces_redimir+1;
                             if ($ServiceFreeClient = ServiceFreeClient::findOrFail($serviceFreeClient[0]->id)->update(array('cantidad_veces_redimir'=>$cantidad))) { }
                             $ifFree=1;
                       }
                  }else{
                      if ($serviceFreeClient =ServiceFreeClient::create(array('cantidad_veces_redimir'=>1,'id_cliente'=>$id_cliente,'id_service' => $id_service ))) {}
                      $ifFree=1;
                  }
              }
        }
        if($ifFree==1){
          $register_redeem_service['is_free']=1;
        }
        if ($service_redemed = RedeemedService::create($register_redeem_service)) {
            $fecha_redimido = $service_redemed->created_at;

            //send email of subscription success
           self::enviarCorreoCliente($email, $nombre_client, $name_service, $name_prestador, $fecha_redimido);

            $error = false;
            $mensaje = 'Se ha redimido correctamente el servicio!';
        } else {
            $error = true;
            $mensaje = 'Error! Se presento un problema al registrar los prestadores del servicio, intenta de nuevo.';
        }

        echo json_encode(array('error' => $error, 'mensaje' => $mensaje));
    }

    public function store_diagnostico(Request $request)
    {
        $error = false;
        $mensaje = '';
        $service_redemed_id = $request->redeemed_service_id;
        $id_diagnostic = $request->code;

        $service_redemed = DB::select(
            'select clave, descripcion from diagnosticoscie10 where id='.$id_diagnostic
        );

        foreach ($service_redemed as $key => $value) {
            $codigo = $value->clave;
            $descripcion = $value->descripcion;

        }
        $search_register_diagnostic_now = DiagnosticRedeemedService::whereDate('created_at', '=', Carbon::now()->format('Y-m-d'))
                                        ->where('redeemed_service_id',$service_redemed_id)->where('code', $codigo)->count();

        if ($search_register_diagnostic_now > 0) {
            $error = true;
            $mensaje = '¡Ops! Ya registraste este diagnóstico a este cliente el día de hoy!';
        } else {
              //$mensaje = 'valor '.$service_redemed;
                $register_redeem_diagnostics = DiagnosticRedeemedService::create([
                    'redeemed_service_id' => $service_redemed_id,
                    'code' => $codigo,
                    'description' => $descripcion,
                ]);

                if ($register_redeem_diagnostics->save()) {
                    $error = false;
                    $mensaje = 'Diagnóstico registrado exitosamente!';
                } else {
                    $error = true;
                    $mensaje = 'Error! Se presento un problema al registrar el diagnóstico del servicio, intenta de nuevo.';
                }
        }



        echo json_encode(array('error' => $error, 'mensaje' => $mensaje));
    }

    function convertirVa($monto){
        $valor = number_format($monto, 2, ',', '.');
        return $valor;
    }

    public function enviarCorreoCliente($email, $nombre_client, $name_service, $name_prestador, $fecha_redimido)
    {
        $mail = new PHPMailer(true);
        try {
            $mail->IsSMTP();
            $mail->SMTPDebug = 0;
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = env('MAIL_ENCRYPTION');
            $mail->Host = env('MAIL_HOST');
            $mail->Port = 465;
            $mail->IsHTML(true);
            $mail->Username = env('MAIL_USERNAME');
            $mail->Password = env('MAIL_PASSWORD');
            $mail->setFrom(env('MAIL_FROM_ADDRESS'), 'CitasMedicas', false);
            $mail->CharSet = "UTF8";
            $mail->Subject = "Beneficio Redimido";

            $mail->AddEmbeddedImage($_SERVER['DOCUMENT_ROOT'].'/app/public/images/emails/redimidosuccces.jpg', 'img_header', '/images/emails/redimidosuccces.jpg', 'base64', 'image/jpg');
            $mail->AddEmbeddedImage($_SERVER['DOCUMENT_ROOT'].'/app/public/images/icons/facebook.png', "correo_facebook", '/images/icons/facebook.png', 'base64', 'image/png');
            $mail->AddEmbeddedImage($_SERVER['DOCUMENT_ROOT'].'/app/public/images/icons/instagram.png', "correo_instagram", '/images/icons/instagram.png', 'base64', 'image/png');
            // $mail->AddEmbeddedImage("images/icons/correo_whatsapp.png", "correo_whatsapp");

            $title = '';
            $mail->Body = view('email.serviceredeemed', compact(
                'title',
                'nombre_client',
                'name_service',
                'name_prestador',
                'fecha_redimido'
            ))->render();
            $mail->addAddress($email, $nombre_client);
            if ($mail->Send()) {
                return 200;
            } else {
                dd('error');
            }
        } catch (Exception $e) {
            dd($e);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RedeemedService  $redeemedService
     * @return \Illuminate\Http\Response
     */
    public function show(RedeemedService $redeemedService)
    {
        //
    }
    public function getservicesfrees($user_id,$service_id)
    {
          $consultar_user = Client::where('user_id', $user_id)->get();
          $userInformation = UserInformation::where('user_id', Auth::user()->id)->get(['id']);
          $convenio = Convenio::where('responsable_id',  $userInformation[0]->id)->get(['id']);
          $totalRedimible=0;
          $ifservicesFree=false;
          $subscription = Subscription::where('user_id', $user_id)->orderBy('next_payment', 'desc')->get();
          if(count($subscription)>0){
             $servicesFree = ServicesFree::where([ 'plan_id' =>   $subscription[0]->plan_id,'service_id' => $service_id,'convenio_id' => $convenio[0]->id])->get();
             $date = Carbon::parse($subscription[0]->created_at);
             if(count($servicesFree)>0){
                  $fechaAct = $date->addDay($servicesFree[0]->duration_in_days);
                  $ifservicesFree=true;
                  if ($fechaAct >= now()->toDateString()){
                      $serviceFreeClient = ServiceFreeClient::where(['id_cliente' => $consultar_user[0]->id,'id_service' => $service_id])->get();
                      if(count($serviceFreeClient)>0){
                          $totalRedimible=$servicesFree[0]->cantidad_redimido-$serviceFreeClient[0]->cantidad_veces_redimir;
                      }else{
                          $totalRedimible=$servicesFree[0]->cantidad_redimido;
                      }
                  }
              }
          }
          return json_encode(array('ifservicesFree'=>$ifservicesFree,'cantidad_redimible'=>$totalRedimible));



    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RedeemedService  $redeemedService
     * @return \Illuminate\Http\Response
     */
    public function edit(RedeemedService $redeemedService)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RedeemedService  $redeemedService
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RedeemedService $redeemedService)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RedeemedService  $redeemedService
     * @return \Illuminate\Http\Response
     */
    public function destroy(RedeemedService $redeemedService)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Client;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\CategoryService;
use App\Models\RedeemedService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\DiagnosticRedeemedService;

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

            $info = [
                $value->id,
                $value->find($value->id)->nombre_cliente->name,
                $value->find($value->id)->nombre_cliente->number_identication,
                $value->find($value->id)->nombre_servicio->name,
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
        $consultar_user = Client::find($id);
        $user_id = $consultar_user->user_id;
        $name_client = $consultar_user->name;

        $subscrito = '';
        $client_id = $id;

        if (!optional($user_id)->hasActiveSubscription()) {
            $subscrito = 'si';
        } else {
            $subscrito = 'no';
        }
        //dd($subscrito);
        return view('admin.redimidos.redimir')->with('subscrito', $subscrito)
            ->with('name_client', $name_client)->with('client_id', $client_id);
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

        $register_redeem_service = array(
            'prestador_id' => $request->prestador_id,
            'client_id' => $request->id_client,
            'service_id' => $request->id_service,
        );

        if (RedeemedService::create($register_redeem_service)) {
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

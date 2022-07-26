<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\User;
use App\Models\Client;
use Illuminate\Http\Request;
use App\Models\AttentioShedule;
use App\Models\Convenio;
use App\Models\UserInformation;
use App\Models\NumbersMembersAvailable;
use App\Models\DetailSubscription;
use App\Models\Subscription;
use Dotenv\Validator;
use Illuminate\Support\Facades\DB;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class FrontendController extends Controller
{
    public function comofunciona()
    {

        return view('comofunciona');
    }

    public function beneficios()
    {
        $datos=array();
       $datos['category']= DB::select('select * from category_services');
       $datos['services']= DB::select('select * from services where status=1');
       $datos['convenio_services']= DB::select('select * from convenio_services');
       $datos['convenios']= DB::select('select * from convenios');
       $datos['userInformation']= DB::select('select * from user_information');

        return view('servicios')->with('datos', $datos);
    }

    public function planes()
    {

        return view('afiliate');
    }

    public function contacto()
    {

        return view('contacto');
    }

    public function preguntasfrecuentes()
    {

        return view('preguntasfrecuentes');
    }

    public function subscribirme()
    {

        return view('subscribirme');
    }

    public function enviarCorreoContacto(Request $request)
    {
        $error = false;
        $mensaje = '';
        $validacion = false;

        $email = 'contacto@citasmedicas.es';
        $nombres = $request->name;
        $mailcontact = $request->email;
        $phone = $request->phone;
        $message = $request->message;

        $validate = $request->validate([
            'g-recaptcha-response' => 'required|captcha',
        ]);
        if ($validate) {
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
            $mail->Subject = "Correo de Contácto";

            $mail->AddEmbeddedImage($_SERVER['DOCUMENT_ROOT'].'/app/public/images/emails/nuevomensaje.jpg', 'img_header', '/images/emails/nuevomensaje.jpg', 'base64', 'image/jpg');
            $mail->AddEmbeddedImage($_SERVER['DOCUMENT_ROOT'].'/app/public/images/icons/facebook.png', "correo_facebook", '/images/icons/facebook.png', 'base64', 'image/png');
            $mail->AddEmbeddedImage($_SERVER['DOCUMENT_ROOT'].'/app/public/images/icons/instagram.png', "correo_instagram", '/images/icons/instagram.png', 'base64', 'image/png');
            $mail->AddEmbeddedImage("images/icons/correo_whatsapp.png", "correo_whatsapp");

            $title = '';
            $mail->Body = view('email.emailcontactsend', compact(
                'title',
                'mailcontact',
                'nombres',
                'phone',
                'message'
            ))->render();
            $mail->addAddress($email, $nombres);
            if ($mail->Send()) {
                $error = false;
                $mensaje = 'Se ha enviado el mensaje correctamente!';
            } else {
                $error = true;
                $mensaje = 'Ocurrió un error al enviar el mensaje!';
            }
        } catch (Exception $e) {
            dd($e);
        }
        } else {
            $validacion = false;
            $mensaje = 'Por favor marca la casilla del captcha';
        }




        echo json_encode(array('error' => $error, 'mensaje' => $mensaje, 'validacion' => $validacion));
    }

    public function detallesplan($id)
    {
       $datos=array();
       $datos['plan']= DB::select('select * from plans WHERE id='.$id);
       $datos['plan']=$datos['plan'][0];
       $datos['category']= DB::select('select * from category_services');
       $datos['services']= DB::select('select * from services where status=1');
       $datos['convenio_services']= DB::select('select * from convenio_services');
       $datos['convenios']= DB::select('select * from convenios');
       $datos['userInformation']= DB::select('select * from user_information');
        return view('detallesplan')->with('datos', $datos);
    }

    public function detallesentidad($id)
    {
        $conveniodetaills = UserInformation::find($id);
        $attention_shedule = AttentioShedule::where('responsable_id', $id)->get();
        $convenio = Convenio::where('responsable_id', $id)->first();
        $id_convenio = $convenio->id;

        $userid = $conveniodetaills->user_id;
        $user = User::find($userid);


        $datos=array();
       $datos['category']= DB::select('select * from category_services');
       $datos['services']= DB::select('select * from services where status=1');
       $datos['convenio_services']= DB::select('select * from convenio_services where convenio_id='.$id_convenio);

        return view('detallesentidad', compact('conveniodetaills', 'attention_shedule', 'datos', 'user'));
    }

    public function envio()
    {
      $response=$this->envioSms('573132055688','hola');
       return json_encode($response);
    }



    public function getCiudades(Request $request)
    {
        try {
            $departmen_id = $request->input('departmen_id');
            $departamentos = DB::select(
                'select * from municipios where departamento_id =' . $departmen_id . ''
            );
            $response = ['data' => $departamentos];
        } catch (\Exception $exception) {
            return response()->json(['message' => 'There was an error retrieving the records'], 500);
        }
        return response()->json($response);
    }


    public function finis_subscribe(Request $request)
    {
        return view('confirmsubscribe');
    }
    public function pagar($signature="",$plan="")
    {
      $user = User::where('payment_signature',  $signature)->get();
      $plan_data = Plan::where('id',  $plan)->get();
      if(count($user)>0 && count($plan_data)>0){
          return view('pagar')->with('signature', $signature)->with('plan', $plan)->with("planData",$plan_data[0])->with("user",$user[0]);
      }else{
        return redirect('subscribirme');
      }
    }
    public function store_client(Request $request)
    {
        $error = false;
        $mensaje = '';

        $nombre_client = $request->name;
        $email = $request->email;
        $plane = $request->plane;
        $number_identication = $request->number_identication;
        $last_name = $request->last_name;
        $num_phone = $request->num_phone;
        $sexo = $request->gender;

        $plan = Plan::find($plane);
        $group_or_not = $plan->is_group;
        $cant_people = $plan->cant_people;

        session(['name'=> $nombre_client]);
        session(['last_name'=> $last_name]);
        session(['email'=> $email]);
        session(['plane'=> $plane]);
        session(['number_identication'=> $number_identication]);
        session(['num_phone'=> $num_phone]);
        session(['group_or_not'=> $group_or_not]);
        session(['cant_people'=> $cant_people]);

        $correo = $request->email;
        $num_cedula = $request->number_identication;

        //consulta para validar si ya existe un usuario registrado o no
        $validar_email = User::where('email', $correo)->count();
        $validar_cedula = Client::where('number_identication', $num_cedula)->count();

        if ($validar_email > 0) {
            $error = true;
            $mensaje = 'Error! Ya se encuentra registrado un usuario con este correo electronico "' . $correo . '". Intente con otro.';
        } else if ($validar_cedula > 0) {
            $error = true;
            $mensaje = 'Error! Ya se encuentra registrado un usuario con este documento "' . $num_cedula . '".';
        } else {
            # validamos si existe la imagen en el request
            // $image = $request->file('imgLogo')->store('public/clients');
            // $url = Storage::url($image);
            $payment_signature=base64_encode(Hash::make($num_cedula));
            $register_user = array(
                'name' => $nombre_client,
                'email' => $correo,
                'password' => Hash::make($num_cedula),
                'pw_decrypte' => $num_cedula,
                'status' => 0,
                'is_prestador' => 0,
                'payment_signature' =>$payment_signature
            );

            if ($user_add = User::create($register_user)->assignRole('Cliente')) {
                $id_user = $user_add->id;
                session(['payment_signature'=>$payment_signature]);
                $register_client_info = array(
                    'user_id' => $id_user,
                    'name' => $nombre_client,
                    'last_name' => $request->last_name,
                    'number_identication' => $number_identication,
                    'type_identication' => 'C.C',
                    'photo' => 'null',
                    'age' => '0',
                    'gender' => $sexo,
                    'date_of_birth' => $request->date_of_birth,
                    'address' => $request->address,
                    'neighborhood' => $request->neighborhood,
                    'email' => $correo,
                    'department' =>  $request->department,
                    'city' =>  $request->city,
                    'num_phone' => $num_phone,
                    'is_owner' => 0,
                );

                if ($responsable = Client::create($register_client_info)) {
                    $id_user_responsable = $responsable->id;
                    $error = false;
                    $mensaje = 'Registro Exitoso!';
                    $this->enviarCorreo($email,"Registro CitasMedicas","email.clientecreated","cuentacreadacliente.jpg",$nombre_client,$number_identication,$plan,date("Y-m-d"));
                } else {
                    $error = true;
                    $mensaje = 'Error! Se presento un problema en el registro.';
                }
            } else {
                $error = true;
                $mensaje = 'Error! Se presento un problema en los datos de registro, intenta de nuevo.';
            }
        }
        echo json_encode(array('error' => $error, 'mensaje' => $mensaje));
    }
    public function suscripcion_exitosa(Request $request)
    {

      if ($request->session()->has('confirmar_pago')) {
          return view('suscripcion-exitosa')->with('nombre_client', $request->session()->get('confirmar_pago')['name'])
            ->with('last_name',$request->session()->get('confirmar_pago')['last_name'])->with('email',$request->session()->get('confirmar_pago')['email']);
      }else{
           return redirect('login');
      }
    }
    public function validar(Request $request)
    {
        $error=false;
        $mensaje="";
        if($request->signature!=null){
            $user = User::where('payment_signature',  $request->signature)->get();
            $plan = Plan::where('slug',  $request->preapproval_plan_id)->get();
            if(count($user)>0  && count($plan)>0 ){
                 $response=$this->validarPago($request->preapproval_plan_id,$request->email,$request->card_token_id);
                 if($response['status']=="authorized"){
                     if (User::findOrFail($user[0]->id)->update(array('status' => 1,'payment_signature'=>''))){
                            if (Client::where('user_id', $user[0]->id)->update(array('is_owner' => 1))) {
                                $register_suscribe = array(
                                    'next_payment' =>  date("Y-m-d",strtotime($response['next_payment_date'])),
                                    'user_id' => $user[0]->id,
                                    'plan_id' =>$plan[0]->id,
                                );
                                if ($suscription_add = Subscription::create($register_suscribe)) {
                                   $cliente = Client::where('user_id', $user[0]->id)->first();
                                    session(['confirmar_pago' =>['name'=>$cliente->name,'email'=>$user[0]->email,'last_name'=>$cliente->last_name]]);
                                    $register_details_subscription = array(
                                        'user_id' => $user[0]->id,
                                        'suscription_id' => $suscription_add->id,
                                        'operation_id' =>$response['id'],
                                        'payer_id' => $plan[0]->id,
                                        'status_operation' => $response['status'],
                                        'next_payment_date' =>date("Y-m-d H:i:s", strtotime($response['next_payment_date'])),
                                        'payment_method_id' => $response['payment_method_id'],
                                        'payer_first_name' =>$request->name,
                                        'payer_last_name' =>  $cliente->last_name,
                                        'preapproval_plan_id' => $response['preapproval_plan_id'],
                                    );
                                    if ($user_add = DetailSubscription::create($register_details_subscription)) {

                                            $register_number_members = array(
                                                'client_id' => $cliente->id,
                                                'registered_members' => $plan[0]->cant_people,
                                            );
                                            if ($number_members_add = NumbersMembersAvailable::create($register_number_members)) {
                                                $this->enviarCorreo($user[0]->email,"Suscripción CitasMedicas","email.suscribesuccess","BannerMailing.jpg", $cliente->name,$cliente->number_identication,$plan[0], date("Y-m-d", strtotime($response['next_payment_date'])));
                                                $this->envioSms("57".$cliente->num_phone,"Citas Medicas: Te has suscrito a Citasmedicas exitosamente, disfruta de nuestros beneficios");
                                            }
                                    }
                                }
                            }
                     }

                 }else{
                     $error=true;
                     $mensaje=$response['mensaje'];
                 }
            }else{
              $error=true;
              $mensaje="Recibo no encontrado";
            }


        }
        return json_encode(array('error' => $error, 'mensaje' => $mensaje));
    }

}

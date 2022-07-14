<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\User;
use App\Models\Client;
use Illuminate\Http\Request;
use App\Models\AttentioShedule;
use App\Models\PaymentPlatform;
use App\Models\UserInformation;
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

        return view('servicios');
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

        $email = 'contacto@citasmedicas.es';
        $nombres = $request->name;
        $mailcontact = $request->email;
        $phone = $request->phone;
        $message = $request->message;

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
            // $mail->AddEmbeddedImage("images/icons/correo_whatsapp.png", "correo_whatsapp");

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
                $error = false;
                $mensaje = 'Ocurrió un error al enviar el mensaje!';
            }
        } catch (Exception $e) {
            dd($e);
        }
        echo json_encode(array('error' => $error, 'mensaje' => $mensaje));
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

        return view('detallesentidad', compact('conveniodetaills', 'attention_shedule'));
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
    public function pagar()
    {
        return view('pagar');
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

            $register_user = array(
                'name' => $nombre_client,
                'email' => $correo,
                'password' => Hash::make($num_cedula),
                'pw_decrypte' => $num_cedula,
                'status' => 0,
                'is_prestador' => 0,
            );

            if ($user_add = User::create($register_user)->assignRole('Cliente')) {
                $id_user = $user_add->id;

                $register_client_info = array(
                    'user_id' => $id_user,
                    'name' => $nombre_client,
                    'last_name' => $request->last_name,
                    'number_identication' => $number_identication,
                    'type_identication' => 'C.C',
                    'photo' => 'null',
                    'age' => '0',
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
}

<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Subscription;
use App\Models\Plan;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use Illuminate\Support\Facades\Http;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
  public function envioSms($number,$message){
     $response = Http::accept('application/json')->post(env('API_SMS_AUTH'), [
        'account' => '00486780843',
        'password' => 'Weppy*963.',
     ])->throw()->json();
     $token=$response['token'];
     $response = Http::withHeaders([
          'api-key' => '2cf3f75a2ad4af861386d82846a120dcc8f0c3cc',
          'Authorization' => 'Bearer '.$token,
        ])->post('https://api.cellvoz.com/v2/sms/single', [
        'number' => $number,
        'message' => $message,
        'messageId' => '1',
        'success' => true,
      ])->throw()->json();
      return $token=$response;
    }

    public function validarSuscripcionClienteUsuario($id){
      $ifSubs=false;
      $ifExisteSubs=false;

      $verificar_subs = Subscription::where('user_id',  $id)->get();
             if(count($verificar_subs)>0){
                 $ifExisteSubs=true;
                 if ($verificar_subs[0]->next_payment >= Carbon::now('America/Bogota')->format('Y-m-d')) {
                   $ifSubs=true;
                 }
             }

             return array(
              'status_subscription' => $ifSubs,
              'is_subscribe' => $ifExisteSubs,
             );
    }
   public function validarPago($preapproval_plan_id,$email,$card_token_id){
    $arrayError=['cc_rejected_high_risk'=>'La validación de la tarjeta de crédito ha fallado.Elige otro de los medios de pago','cc_rejected_bad_filled_security_code'=>
    'Revisa el código de seguridad de la tarjeta.','cc_rejected_blacklist'=>'No pudimos procesar tu pago.','cc_rejected_bad_filled_other'=>'Revisa los datos.','cc_rejected_insufficient_amount'=>
    'Tu payment_method_id no tiene fondos suficientes','cc_rejected_max_attempts'=>'Llegaste al límite de intentos permitidos.Elige otra tarjeta u otro medio de pago.','cc_rejected_other_reason'=>
    'payment_method_id no procesó el pago.','Cannot operate between different countries'=>'No se puede operar entre diferentes países'];
    $response = Http::withHeaders([
        'Authorization' => 'Bearer  APP_USR-3372762080079061-062916-e0445026221d018aff8322b937c2ce00-148994351',
      ])->accept('application/json')->post("https://api.mercadopago.com/preapproval", [
     "preapproval_plan_id"=> $preapproval_plan_id,
              "payer_email"=> $email,
              "card_token_id"=>$card_token_id,
              "back_url"=> "https://www.citasmedicas.es/",
              "status"=> "authorized"
   ])->json();
   if($response['status']=="authorized"){
     $response['error']=false;
   }else{
     $response['error']=true;
     if(isset($response['code'])){
         if(isset($arrayError[$response['code']])){
           $response['mensaje']=$arrayError[$response['code']];
         }else{
            $response['mensaje']=$response['message'];
         }
     }else{
         $response['error']=true;
         if(isset($arrayError[$response['message']])){
            $response['mensaje']=$arrayError[$response['message']];
         }else{
           $response['mensaje']=$response['message'];
         }

     }
   }

   return  $response;
  }
  public function enviarCorreo($email,$subject,$plantilla,$nombre_client, $number_identication, $plan, $next_payment_date)
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
          $mail->Subject = $subject;

          $mail->AddEmbeddedImage($_SERVER['DOCUMENT_ROOT'].'/app/public/images/emails/BannerMailing.jpg', 'img_header', '/images/emails/BannerMailing.jpg', 'base64', 'image/jpg');
          $mail->AddEmbeddedImage($_SERVER['DOCUMENT_ROOT'].'/app/public/images/icons/facebook.png', "correo_facebook", '/images/icons/facebook.png', 'base64', 'image/png');
          $mail->AddEmbeddedImage($_SERVER['DOCUMENT_ROOT'].'/app/public/images/icons/instagram.png', "correo_instagram", '/images/icons/instagram.png', 'base64', 'image/png');
          //$mail->AddEmbeddedImage("images/icons/correo_whatsapp.png", "correo_whatsapp");

          $title = '';
          $mail->Body = view($plantilla, compact(
              'title',
              'plan',
              'email',
              'nombre_client',
              'number_identication',
              'next_payment_date'
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
  use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}

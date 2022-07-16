<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Subscription;
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
    'payment_method_id no procesó el pago.'];
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
     if(isset($arrayError[$response['code']])){
       $response['mensaje']=$arrayError[$response['code']];
     }else{
        $response['mensaje']=$response['message'];
     }
   }

   return  $response;
  }
  use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}

<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Http;
class Controller extends BaseController
{
  public function envioSms($number,$message){
     $response = Http::accept('application/json')->post(env('API_SMS_AUTH'), [
        'account' => '00486780843',
        'password' => 'Weppy*963.',
     ])->throw()->json();
     $token=$response['token'];
     $response = Http::withHeaders([
          'api-key' => '0e925130f985f8c5880114dd2bbe5d7e560ed916',
          'Authorization' => 'Bearer '.$token,
        ])->post('https://api.cellvoz.com/v2/sms/single', [
        'number' => $number,
        'message' => $message,
        'messageId' => '1',
        'success' => true,
      ])->throw()->json();
      return $token=$response;
    }
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}

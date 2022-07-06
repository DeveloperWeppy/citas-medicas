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
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}

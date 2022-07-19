<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\DetailSubscription;
use App\Models\NumbersMembersAvailable;
use App\Models\Plan;
use App\Models\User;
use App\Models\Subscription;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use Illuminate\Support\Facades\Http;
use App\Resolvers\PaymentPlatformResolver;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        // $this->middleware(['auth']);
    }

    public function __invoke(Request $request)
    {

    }

    public function index()
    {

         $user = User::where('id',  Auth::id())->get();
         $plans = Plan::where('status',  1)->get();
         return view('cliente.subscripcion.index')->with('plans', $plans)->with('user', $user[0]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function show(Subscription $subscription)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function edit(Subscription $subscription)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subscription $subscription)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subscription $subscription)
    {
        
    }
    public function suscripcion_exitosa(Request $request)
    {
      if ($request->session()->has('confirmar_pago')) {
            $confirmar_pago=$request->session()->get('confirmar_pago');
            Session::forget('confirmar_pago');
            return  view('cliente.subscripcion.suscripcion-exitosa')->with('nombre_client', $confirmar_pago['name'])
              ->with('last_name',$confirmar_pago['last_name'])->with('email',$confirmar_pago['email']);
        }else{
             return redirect('inicio');
        }
    }
    public function validar(Request $request)
    {
              $error=false;
              $mensaje="";
              $response=$this->validarPago($request->preapproval_plan_id,$request->email,$request->card_token_id);
              if($response['status']=="authorized"){
                  $user = User::where('id',  Auth::id())->get();
                  $plan = Plan::where('slug',  $request->preapproval_plan_id)->get();
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
                                             $user[0]->sendEmailVerificationNotification();
                                             $this->enviarCorreo($user[0]->email,"Suscripción CitasMedicas","email.suscribesuccess","BannerMailing.jpg",$cliente->name,$cliente->number_identication,$plan[0], date("Y-m-d", strtotime($response['next_payment_date'])));
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
              return json_encode(array('error' => $error, 'mensaje' => $mensaje));
    }

}

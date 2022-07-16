<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\DetailSubscription;
use App\Models\NumbersMembersAvailable;
use App\Models\Plan;
use App\Models\User;
use App\Models\Subscription;
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
        // $this->middleware(['auth', 'unsubscribed']);
    }

    public function __invoke(Request $request)
    {

    }

    public function index()
    {
          return view('cliente.subscripcion.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function suscripcion_exitosa(Request $request)
    {

      return view('suscripcion-exitosa')->with('nombre_client', 'edin')
          ->with('last_name', 'bal')->with('email', "edin");
    }

    public function enviarCorreo($email, $nombre_client, $number_identication, $plane, $next_payment_date)
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
            $mail->Subject = "Suscripción CitasMedicas";

            $mail->AddEmbeddedImage($_SERVER['DOCUMENT_ROOT'].'/app/public/images/emails/BannerMailing.jpg', 'img_header', '/images/emails/BannerMailing.jpg', 'base64', 'image/jpg');
            $mail->AddEmbeddedImage($_SERVER['DOCUMENT_ROOT'].'/app/public/images/icons/facebook.png', "correo_facebook", '/images/icons/facebook.png', 'base64', 'image/png');
            $mail->AddEmbeddedImage($_SERVER['DOCUMENT_ROOT'].'/app/public/images/icons/instagram.png', "correo_instagram", '/images/icons/instagram.png', 'base64', 'image/png');
            // $mail->AddEmbeddedImage("images/icons/correo_whatsapp.png", "correo_whatsapp");

            $title = '';
            $plan = Plan::find($plane);
            $mail->Body = view('email.suscribesuccess', compact(
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


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);
        $rules = [
            'plan' => ['required', 'exists:plans,slug'],
            'payment_platform' => ['required', 'exists:payment_platforms,id'],
            'cardToken' => ['required'],
            'email' => ['required'],
        ];

        $request->validate($rules);

        $paymentPlatform = $this->paymentPlatformResolver
            ->resolveService($request->payment_platform);

        session()->put('subscriptionPlatformId', $request->payment_platform);

        return $paymentPlatform->handleSubscription($request);
    }

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
        //
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
                     if (User::findOrFail($user[0]->id)->update(array('status' => 1))){
                            if (Client::where('user_id', $user[0]->id)->update(array('is_owner' => 1,'payment_signature'=>''))) {
                                $register_suscribe = array(
                                    'next_payment' => $fecha,
                                    'user_id' => $user[0]->id,
                                    'plan_id' =>$plan[0]->id,
                                );
                                if ($suscription_add = Subscription::create($register_suscribe)) {
                                   $cliente = Client::where('user_id', $user[0]->id)->first();
                                    session(['confirmar_pago' =>['name'=>$cliente->name,'email'=>$user->email,'ap'=>$cliente->last_name]]);
                                    $register_details_subscription = array(
                                        'user_id' => $user[0]->id,
                                        'suscription_id' => $suscription_add->id,
                                        'operation_id' =>$response['preapproval_id'],
                                        'payer_id' => $plan[0]->id,
                                        'status_operation' => $response['status'],
                                        'next_payment_date' =>date("Y-m-d", strtotime($response['next_payment_date'])),
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
                                                 //send email of accountverification
                                                $user[0]->sendEmailVerificationNotification();
                                                self::enviarCorreo($user[0]->email,$cliente->name,$cliente->number_identication, $plan[0]->id, date("Y-m-d", strtotime($response['next_payment_date'])));
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

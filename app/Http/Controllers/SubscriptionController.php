<?php

namespace App\Http\Controllers;

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
    protected $paymentPlatformResolver;

    public function __construct(PaymentPlatformResolver $paymentPlatformResolver)
    {
        // $this->middleware(['auth', 'unsubscribed']);

        $this->paymentPlatformResolver = $paymentPlatformResolver;
    }

    public function __invoke(Request $request)
    {
        
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function suscripcion_exitosa(Request $request)
    {
        $id_operation = $request->preapproval_id;

        $nombre_client = $request->session()->get('name');
        $last_name = $request->session()->get('last_name');
        $email = $request->session()->get('email');
        $plane = $request->session()->get('plane');
        $num_phone = $request->session()->get('num_phone');
        $number_identication = $request->session()->get('number_identication');

        $user_client = User::where('email', $email)->first();
        $id_user_client = $user_client->id;

        //get id operation between API
        $response = Http::withToken('TEST-6103495603469852-121310-6609569fb82b18d89299263dc86ca350-153926661')->get('https://api.mercadopago.com/preapproval/search', [
            'id' => $id_operation,
        ])->json();

        
        $update_user = array(
            'status' => 1
        );

        if (User::findOrFail($id_user_client)->update($update_user)) {

            foreach ($response['results'] as $key => $value) {

                $status = $value['status'];
                $payer_id = $value['payer_id'];
                $next_payment_date = $value['next_payment_date'];
                $payment_method_id = $value['payment_method_id'];
                $payer_first_name = $value['payer_first_name'];
                $payer_last_name = $value['payer_last_name'];
            }
            
            if ($status == "authorized") {

                $register_suscribe = array(
                    'next_payment' => date($next_payment_date),
                    'user_id' => $id_user_client,
                    'plan_id' => $plane,
                );

                if ($user_add = Subscription::create($register_suscribe)) {

                }


                 //send email of accountverification 
                $user_client->sendEmailVerificationNotification();

                //send email of subscription success
                self::enviarCorreo($email, $nombre_client, $number_identication, $plane);
            }

           
        }
        
        return view('suscripcion-exitosa')->with('nombre_client', $nombre_client)
                ->with('last_name', $last_name)->with('email', $email); 
    }

    public function enviarCorreo($email, $nombre_client, $number_identication, $plane)
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
            $mail->setFrom(env('MAIL_FROM_ADDRESS'), 'MaxPharma', false);
            $mail->Subject = "Registro";

            $mail->AddEmbeddedImage("images/Logo-citas-medicas.png", "img_header");
            $mail->AddEmbeddedImage("images/icons/facebook.png", "correo_facebook");
            $mail->AddEmbeddedImage("images/icons/instagram.png", "correo_instagram");
            // $mail->AddEmbeddedImage("images/icons/correo_whatsapp.png", "correo_whatsapp");

            $title = 'Suscripción Exitosa';
            $plan = Plan::find($plane);
            $mail->Body = view('email.suscribesuccess', compact(
                'title',
                'plan',
                'email',
                'nombre_client',
                'number_identication'
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
}

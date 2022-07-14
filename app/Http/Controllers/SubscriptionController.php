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
        $id_operation = $request['preapproval_id'];

        $status  = '';
        $payer_id = '';
        $next_payment_date = '';
        $payment_method_id = '';
        $payer_first_name = '';
        $payer_last_name = '';
        $preapproval_plan_id = '';

        $nombre_client = $request->session()->get('name');
        $last_name = $request->session()->get('last_name');
        $email = $request->session()->get('email');
        $plane = $request->session()->get('plane');
        $num_phone = $request->session()->get('num_phone');
        $number_identication = $request->session()->get('number_identication');
        $group_or_not = $request->session()->get('group_or_not');
        $cant_people = $request->session()->get('cant_people');

        $user_client = User::where('email', $email)->first();
        $id_user_client = $user_client->id;

        $cliente = Client::where('user_id', $id_user_client)->first();
        $id_client = $cliente->id;

        //get id operation between API
        $response = Http::withToken(config('services.mercadopago.token'))->get('https://api.mercadopago.com/preapproval/search', [
            'id' => $id_operation,
        ])->json();


        $update_user = array(
            'status' => 1
        );

        $update_data_client = array(
            'is_owner' => 1
        );

        if (User::findOrFail($id_user_client)->update($update_user)) {

            if (Client::findOrFail($id_client)->update($update_data_client)) {

                foreach ($response['results'] as $key => $value) {

                    $status = $value['status'];
                    $payer_id = $value['payer_id'];
                    $next_payment_date = $value['next_payment_date'];
                    $payment_method_id = $value['payment_method_id'];
                    $payer_first_name = $value['payer_first_name'];
                    $payer_last_name = $value['payer_last_name'];
                    $preapproval_plan_id = $value['preapproval_plan_id'];
                }
                $fecha = date("Y-m-d", strtotime($next_payment_date));
                //dump($fecha);
                if ($status == "authorized") {

                    $register_suscribe = array(
                        'next_payment' => $fecha,
                        'user_id' => $id_user_client,
                        'plan_id' => $plane,
                    );

                    if ($suscription_add = Subscription::create($register_suscribe)) {
                        $id_subscription = $suscription_add->id;

                        $register_details_subscription = array(
                            'user_id' => $id_user_client,
                            'suscription_id' => $id_subscription,
                            'operation_id' => $id_operation,
                            'payer_id' => $payer_id,
                            'status_operation' => $status,
                            'next_payment_date' => $fecha,
                            'payment_method_id' => $payment_method_id,
                            'payer_first_name' => $payer_first_name,
                            'payer_last_name' => $payer_last_name,
                            'preapproval_plan_id' => $preapproval_plan_id,
                        );

                        if ($user_add = DetailSubscription::create($register_details_subscription)) {

                                $register_number_members = array(
                                    'client_id' => $id_client,
                                    'registered_members' => $cant_people,
                                );

                                if ($number_members_add = NumbersMembersAvailable::create($register_number_members)) {
                                     //send email of accountverification
                                    $user_client->sendEmailVerificationNotification();

                                    //send email of subscription success
                                    self::enviarCorreo($email, $nombre_client, $number_identication, $plane, $next_payment_date);

                                    $this->envioSms("57".$num_phone,"Citas Medicas: Te has suscrito a Citasmedicas exitosamente, disfruta de nuestros beneficios");

                                    return view('suscripcion-exitosa')->with('nombre_client', $nombre_client)
                                        ->with('last_name', $last_name)->with('email', $email);
                                }

                        }
                    }
                }
            }


        }


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
        $response = Http::withHeaders([
            'Authorization' => 'Bearer  APP_USR-3372762080079061-062916-e0445026221d018aff8322b937c2ce00-148994351',
          ])->accept('application/json')->post("https://api.mercadopago.com/preapproval", [
         "preapproval_plan_id"=> $request->preapproval_plan_id,
                  "payer_email"=> $request->email,
                  "card_token_id"=>$request->card_token_id,
                  "back_url"=> "https://www.citasmedicas.es/",
                  "status"=> "authorized"
       ])->throw()->json();

        return $response;
    }


}

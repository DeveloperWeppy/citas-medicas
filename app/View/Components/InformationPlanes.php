<?php

namespace App\View\Components;

use App\Models\Plan;
use App\Models\PlanServices;
use Illuminate\View\Component;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use Illuminate\Support\Facades\Http;

class InformationPlanes extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $datas = array();

        $planes = Plan::where('status', 1)->where('status', '1')->get();



        foreach ($planes as $key => $value) {
            $id_plan = $value->id;
            $name_plan = $value->name;

            $servicesplan = PlanServices::where('plan_id', $id_plan)->limit(3)->get();


            $data = [
                'servicios' =>  $servicesplan,
            ];

            $datas[] = $data;

        }
     /*    $next_payment_date = '';
        $response = Http::withToken(config('services.mercadopago.token'))->get('https://api.mercadopago.com/preapproval/search', [
            'id' => '2c93808481b490c20181bb507b1d04c9',
        ])->json();

         foreach ($response['results'] as $key => $value) {

            $next_payment_date = $value['next_payment_date'];
        }
        $fecha = date("Y-m-d", strtotime($next_payment_date));
        dump($fecha);  */
        $email = 'desarrolloweppy@gmail.com';
        $nombre_client = 'manuel';
        $number_identication = '1091811138';
        $next_payment_date = '2023-07-06';


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
            $mail->Subject = "Suscripción";

            $mail->AddEmbeddedImage($_SERVER['DOCUMENT_ROOT'].'/app/public/images/BannerMailing.jpg', 'img_header', '/images/BannerMailing.jpg', 'base64', 'image/jpg');
            $mail->AddEmbeddedImage($_SERVER['DOCUMENT_ROOT'].'/app/public/images/icons/facebook.png', "correo_facebook", '/images/icons/facebook.png', 'base64', 'image/png');
            $mail->AddEmbeddedImage($_SERVER['DOCUMENT_ROOT'].'/app/public/images/icons/instagram.png', "correo_instagram", '/images/icons/instagram.png', 'base64', 'image/png');
            // $mail->AddEmbeddedImage("images/icons/correo_whatsapp.png", "correo_whatsapp");

            $title = 'Suscripción Exitosa';
            $mail->Body = view('email.suscribesuccess', compact(
                'title',
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

        return view('components.frontend.information-planes')->with('datas', $datas)->with('planes', $planes)->with('servicesplan', $servicesplan);



    }
}

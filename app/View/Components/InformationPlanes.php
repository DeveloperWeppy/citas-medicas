<?php

namespace App\View\Components;

use App\Models\Plan;
use App\Models\User;
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
        /*$user_client = User::where('email', 'admin@citasmedicas.com')->first();
        $user_client->sendEmailVerificationNotification();
         $next_payment_date = '';
        $response = Http::withToken(config('services.mercadopago.token'))->get('https://api.mercadopago.com/preapproval/search', [
            'id' => '2c93808481b490c20181bb507b1d04c9',
        ])->json();

         foreach ($response['results'] as $key => $value) {

            $next_payment_date = $value['next_payment_date'];
        }
        $fecha = date("Y-m-d", strtotime($next_payment_date));
        dump($fecha);  */

        return view('components.frontend.information-planes')->with('datas', $datas)->with('planes', $planes)->with('servicesplan', $servicesplan);



    }
}

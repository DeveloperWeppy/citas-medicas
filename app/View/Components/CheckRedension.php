<?php

namespace App\View\Components;

use App\Models\Client;
use App\Models\Service;
use App\Models\Convenio;
use Illuminate\View\Component;
use App\Models\UserInformation;
use App\Models\ConvenioServices;
use App\Models\PlanServices;
use App\Models\Subscription;
class CheckRedension extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $clientId;
    public function __construct($clientId)
    {
        $this->clientId = $clientId;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $info_services = array();
        $arrayIdServ = array();
        $id_prestador_auth = auth()->id();
        $client = Client::find($this->clientId);
        $subscription = Subscription::where('user_id',$client->user_id)->orderBy('next_payment', 'desc')->get();
        $exists_service_in_plan = PlanServices::where('plan_id', $subscription[0]->plan_id)->get();
        foreach ($exists_service_in_plan as $key => $value) {
                      array_push($arrayIdServ,$value->service_id);
        }
        $servicios = Service::whereIn('id',$arrayIdServ)->get(['id','name']);
        $servicios=json_decode(json_encode($servicios),true);
        $user_information = UserInformation::where('user_id', $id_prestador_auth)->first();
        $convenio = Convenio::where('responsable_id', $user_information->id)->first();
        $convenioServices = ConvenioServices::where('convenio_id', $convenio->id)->get();
        foreach ($convenioServices as $key => $value) {
                 $ifExist=array_search($value->service_id, array_column($servicios, 'id'));
                 $precio=$value->price_discount;
                 if($value->percentage_discount!=0 && $value->percentage_discount!=null ){
                    $precio=ceil(($value->price_normal*(100-$value->percentage_discount))/100);
                 }
                 $precio=number_format($precio, 2, ',', '.');
                 array_push($info_services,array('id' =>$value->service_id,'name' =>$servicios[$ifExist]['name'],'price'=> $precio));
        }
        return view('components.redimir.check-redension')->with('client', $client)
                    ->with('info_services', $info_services)->with('id_user_information', $user_information->id);
    }
}

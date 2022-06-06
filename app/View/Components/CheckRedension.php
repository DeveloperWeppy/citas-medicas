<?php

namespace App\View\Components;

use App\Models\Client;
use App\Models\Service;
use App\Models\Convenio;
use Illuminate\View\Component;
use App\Models\UserInformation;
use App\Models\ConvenioServices;
use App\Models\PlanServices;

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
        $info_services = [];

        $id_prestador_auth = auth()->id();
        $client = Client::find($this->clientId);
        //extract id convenio
        $user_information = UserInformation::where('user_id', $id_prestador_auth)->first();
        $id_user_information = $user_information->id;

        $convenio = Convenio::where('responsable_id', $id_user_information)->first();
        $id_convenio = $convenio->id;

        $services = ConvenioServices::where('convenio_id', $id_convenio)->get();
        $servicios = '';
        foreach ($services as $key => $value) {
            $services_uid = $value->service_id;

            $exists_service_in_plan = PlanServices::where('service_id', $services_uid)->count();

            if ($exists_service_in_plan > 0) {
                $servicios = Service::where('id', $services_uid)->get();

                foreach ($servicios as $key => $value) {
                    $id_service = $value->id;
                    $name_service = $value->name;

                    $datos = array(
                        'id' => $id_service,
                        'name' => $name_service,
                    );
    
                    $info_services[] = array(
                        'datos' => $datos,
                    );
                }
            } 
        }
       

        return view('components.redimir.check-redension')->with('client', $client)
                    ->with('info_services', $info_services)->with('id_user_information', $id_user_information);
    }
}

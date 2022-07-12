<?php

namespace App\View\Components;

use App\Models\Plan;
use App\Models\Service;
use App\Models\PlanServices;
use App\Models\ConvenioServices;
use App\Models\Convenio;
use App\Models\UserInformation;
use Illuminate\View\Component;

class ViewPlan extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $idPlan;
    public function __construct($idPlan)
    {
        $this->idPlan = $idPlan;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $info_services = [];
        $plan = Plan::findOrFail($this->idPlan);

        $planes_services = PlanServices::where('plan_id', $this->idPlan)->get();
        //$convenio_services = ConvenioServices::where('plan_id', $this->idPlan)->get();
        $inServiceId=array();
        foreach ($planes_services as $key => $value) {
            $servicios_plan = $value->service_id;
            array_push($inServiceId,$servicios_plan);
            $servicios = Service::where('id', $servicios_plan)->get(['id', 'name']);

            foreach ($servicios as $key => $item) {
                $id_service_plan = $item->id;
                $name_servicie = $item->name;

                $datos = array(
                    'id' => $id_service_plan,
                    'name' => $name_servicie,
                );

                $info_services[] = array(
                    'datos' => $datos,
                );
            }

        }
        $inConvenioId=array();
        $userInformationServices=array();
        $convenio_services = ConvenioServices::whereIn('service_id',$inServiceId)->get(['service_id','convenio_id','price_normal', 'price_discount']);
        foreach ($convenio_services as $key => $value) {
              array_push($inConvenioId,$value->convenio_id);
              array_push($userInformationServices,array(
                  'service_id' => $value->service_id,
                  'convenio_id' => $value->convenio_id,
                  'price_normal' => $value->price_normal,
                  'price_discount' => $value->price_discount,
              ));
        }
        $convenio = Convenio::whereIn('id',$inConvenioId)->get();
        $inResponsable_id=array();
        foreach ($convenio as $key => $value) {
              array_push($inResponsable_id,$value->responsable_id);
              foreach ($userInformationServices  as $key2 => $value2) {
                      if($userInformationServices[$key2]['convenio_id']==$value->id){
                        $userInformationServices[$key2]['responsable_id']=$value->responsable_id;
                      }
              }
        }
        $userInformation = UserInformation::whereIn('id',$inResponsable_id)->get(['id', 'name']);
        $userInformation=json_decode(json_encode( $userInformation), true );
        foreach ($userInformationServices  as $key => $value) {
                $key2=array_search($value['responsable_id'],array_column($userInformation ,'id'));
                $userInformationServices[$key]['name']=$userInformation[$key2]['name'];
        }
        return view('components.planes.view-plan')
            ->with('info_services', $info_services)
            ->with('plan', $plan)->with('convenio_services', $convenio_services)->with('userInformationServices', $userInformationServices);
    }
}

<?php

namespace App\View\Components;

use App\Models\Plan;
use App\Models\PlanServices;
use App\Models\ServicesFree;
use App\Models\UserInformation;
use App\Models\Convenio;
use App\Models\Service;
use Illuminate\View\Component;

class FormEditPlan extends Component
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
        $index=0;
        $arrayId=array();
        $serviciosSelect=array();
        $plan = Plan::findOrFail($this->idPlan);
        $planes_services = PlanServices::where('plan_id', $this->idPlan)->get();
        $servicesS= Service::where('status', 1)->get(['id', 'name']);
        foreach ($servicesS as $value){
        $serviciosSelect[$index]['id']=$value->id;
        $serviciosSelect[$index]['text']=$value->name;
        $index++;
        }
        $servicesFree= ServicesFree::where('plan_id', $this->idPlan)->get();
        $convConven=array();
        foreach ($servicesFree as $key => $value) {
               $ifExist = array_search($value->service_id, array_column($convConven, 'service_id'));
               if ($ifExist === false ) {
                  array_push($convConven,array('service_id'=>$value->service_id,'cantidad_redimido'=>$value->cantidad_redimido,'duration_in_days'=>$value->duration_in_days,'conv'=>array($value->convenio_id),'resp'=>array()));
               }else{
                   $convConven[$ifExist]['conv'][count($convConven[$ifExist]['conv'])]=$value->convenio_id;
               }
               array_push($arrayId,$value->convenio_id);
        }

        $convenio = Convenio::whereIn('id',$arrayId)->get(['id','responsable_id']);
        foreach ($convenio as $key => $value) {
                foreach ($convConven as $key2 => $value2) {
                   $buscar = array_search($value->id, $value2['resp']);
                   $convConven[$key2]['resp'][$buscar]=$value->responsable_id;
                }
        }
        foreach ($planes_services as $key => $value) {
            $servicios_plan = $value->service_id;
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
        $convenio = Convenio::all();
        $arrayId=array();
        $arrayIdC=array();
        foreach ($convenio as $value){
              array_push($arrayId,$value->responsable_id);
              array_push($arrayIdC,array("res"=>$value->responsable_id,"id"=>$value->id));
        }
        $userInformation = UserInformation::whereIn('id', $arrayId)->get(['id','name']);
        foreach ($userInformation as $index =>$value){
            $ifExist = array_search($value->id, array_column($arrayIdC, 'res'));
            $arrayUserInf[$index]['id']=$arrayIdC[$ifExist]["id"];
            $arrayUserInf[$index]['text']=$value->name;
        }

        return view('components.planes.form-edit-plan')
                    ->with('info_services', $info_services)
                    ->with('plan', $plan)->with('serviciosSelect', $serviciosSelect)->with('servicesFree', $convConven)->with('arrayUserInf', $arrayUserInf);
    }
}

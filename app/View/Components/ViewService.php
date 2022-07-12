<?php

namespace App\View\Components;

use App\Models\Service;
use App\Models\Specialty;
use Illuminate\View\Component;
use App\Models\CategoryService;
use App\Models\UserInformation;
use App\Models\ConvenioServices;
use App\Models\Convenio;
class ViewService extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $idService;
    public function __construct($idService,$attentioShedule=array())
    {
        $this->idService = $idService;
        $this->attentioShedule = $attentioShedule;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $info_convenio = [];
        $service = Service::findOrFail($this->idService);
        $convenios_services = ConvenioServices::where('service_id', $this->idService)->get();
        $inConvenioId=array();
        $info_convenio=array();
        foreach ($convenios_services as $key => $value) {
            array_push($inConvenioId,$value->convenio_id);
            array_push($info_convenio,array(
                'id' => $value->convenio_id,
                'price_normal' =>  $value->price_normal,
                'price_discount' =>  $value->price_discount,
             ));
        }
        $convenio = Convenio::whereIn('id',$inConvenioId)->get();
        $inResponsable_id=array();
        foreach ($convenio as $key => $value) {
           array_push($inResponsable_id,$value->responsable_id);
           $index=array_search($value->id, array_column($info_convenio, 'id'));
           $info_convenio[$index]['responsable_id']=$value->responsable_id;
        }
        $userInformation = UserInformation::whereIn('id', $inResponsable_id)->get(['id', 'name']);
        foreach ($userInformation as $key => $value) {
              $index=array_search($value->id, array_column($info_convenio, 'responsable_id'));
              $info_convenio[$index]['name']=$value->name;
        }
        return view('components.services.view-service')
        ->with('info_convenio', $info_convenio)
                ->with('service', $service)->with('attentioShedule', $this->attentioShedule);
    }
}

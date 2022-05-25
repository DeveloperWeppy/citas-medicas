<?php

namespace App\View\Components;

use App\Models\Service;
use App\Models\Specialty;
use Illuminate\View\Component;
use App\Models\CategoryService;
use App\Models\UserInformation;
use App\Models\ConvenioServices;

class ViewService extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $idService;
    public function __construct($idService)
    {
        $this->idService = $idService;
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

        foreach ($convenios_services as $key => $value) {
            $convenio_user = $value->convenio_id;
            
            $convenios = UserInformation::where('id', $convenio_user)->get(['id', 'name']);
            
            foreach ($convenios as $key => $item) {
                $id_user_convenio = $item->id;
                $name_user_convenio = $item->name;

                $datos = array(
                    'id' => $id_user_convenio,
                    'name' => $name_user_convenio,
                );

                $info_convenio[] = array(
                    'datos' => $datos,
                );
            }

        }
        return view('components.services.view-service')
        ->with('info_convenio', $info_convenio)
                ->with('service', $service);
    }
}

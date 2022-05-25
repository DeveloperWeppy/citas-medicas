<?php

namespace App\View\Components;

use App\Models\Plan;
use App\Models\Service;
use App\Models\PlanServices;
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
        return view('components.planes.view-plan')
            ->with('info_services', $info_services)
            ->with('plan', $plan);
    }
}

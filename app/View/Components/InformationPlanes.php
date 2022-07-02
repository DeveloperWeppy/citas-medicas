<?php

namespace App\View\Components;

use App\Models\Plan;
use App\Models\PlanServices;
use Illuminate\View\Component;

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

        return view('components.frontend.information-planes')->with('datas', $datas)->with('planes', $planes)->with('servicesplan', $servicesplan);



    }
}

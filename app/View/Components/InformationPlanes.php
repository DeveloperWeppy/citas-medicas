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
        $planes = Plan::where('status', 1)->get();

        foreach ($planes as $key => $value) {
            $id_plan = $planes->id;

            $servicesplan = PlanServices::where('plan_id', $id_plan)->get();
            
            foreach ($servicesplan as $key => $items) {
                
            }
        }
        return view('components.frontend.information-planes')->with('planes', $planes);
    }
}

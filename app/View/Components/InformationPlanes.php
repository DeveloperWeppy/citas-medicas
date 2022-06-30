<?php

namespace App\View\Components;

use App\Models\Plan;
use App\Models\PlanServices;
use Illuminate\View\Component;
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
        
        $planes = Plan::where('status', 1)->where('type_plan', 'Mensual')->get();
        
        foreach ($planes as $key => $value) {
            $id_plan = $value->id;
            $name_plan = $value->name;

            $servicesplan = PlanServices::where('plan_id', $id_plan)->limit(3)->get();
            
            
            $data = [
                'servicios' =>  $servicesplan,
            ];

            $datas[] = $data;
        } 
        
        /*$response = Http::withToken('TEST-6103495603469852-121310-6609569fb82b18d89299263dc86ca350-153926661')->get('https://api.mercadopago.com/preapproval/search', [
            'id' => '2c93808481ae6fd20181b013427600a3',
        ])->json();

         foreach ($response['results'] as $key => $value) {
            
            foreach ($value['results'] as $key => $value) {
                # code...
            }
        }
        dd($value['status']); */
        return view('components.frontend.information-planes')->with('datas', $datas)->with('planes', $planes)->with('servicesplan', $servicesplan);
        
       
        
    }
}

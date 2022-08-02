<?php

namespace App\View\Components;

use App\Models\Service;
use Illuminate\View\Component;

class FormRegisterPlan extends Component
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
        $services = Service::where('status', 1)->get(['id', 'name']);
        $index=0;
        $serviciosSelect = array();
        foreach ($services as $value){
        $serviciosSelect[$index]['id']=$value->id;
        $serviciosSelect[$index]['text']=$value->name;
        $index++;
        }
        return view('components.planes.form-register-plan')->with('services', $services)->with('serviciosSelect', $serviciosSelect);
    }
}

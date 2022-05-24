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
        $services = Service::get(['id', 'name']);
        return view('components.planes.form-register-plan')->with('services', $services);
    }
}

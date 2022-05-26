<?php

namespace App\View\Components;

use App\Models\Plan;
use App\Models\Service;
use App\Models\UserInformation;
use Illuminate\View\Component;

class ViewHome extends Component
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
        $planes = Plan::count();
        $servicios = Service::count();
        $convenios = UserInformation::count();
        return view('components.view-home')
            ->with('planes', $planes)
            ->with('servicios', $servicios)
            ->with('convenios', $convenios);
    }
}

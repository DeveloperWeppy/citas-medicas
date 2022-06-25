<?php

namespace App\View\Components;

use App\Models\Plan;
use Illuminate\View\Component;
use Illuminate\Support\Facades\DB;

class BloqueDeSubscripcion extends Component
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
        $departments = DB::select(
            'select * from departamentos'
        );
        $planes = Plan::where('status', 1)->get();
        return view('components.frontend.bloque-de-subscripcion')->with('planes', $planes)->with('departments', $departments);
    }
}

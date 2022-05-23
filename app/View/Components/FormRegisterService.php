<?php

namespace App\View\Components;

use App\Models\CategoryService;
use App\Models\Specialty;
use App\Models\UserInformation;
use Illuminate\View\Component;

class FormRegisterService extends Component
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
        $categorys = CategoryService::get();
        $specialitys = Specialty::get();
        $convenios = UserInformation::get(['id', 'name']);
        
        return view('components.services.form-register-service')
            ->with('categorys', $categorys)
            ->with('specialitys', $specialitys)
            ->with('convenios', $convenios);
    }
}

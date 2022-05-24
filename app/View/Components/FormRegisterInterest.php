<?php

namespace App\View\Components;

use App\Models\CategoryService;
use Illuminate\View\Component;

class FormRegisterInterest extends Component
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
        $categorias = CategoryService::get(['id', 'name']);
        return view('components.interests.form-register-interest')->with('categorias', $categorias);
    }
}

<?php

namespace App\View\Components;

use App\Models\CategoryService;
use Illuminate\View\Component;

class FormEditCategory extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $idcategory;
    public function __construct($idcategory)
    {
        $this->idcategory = $idcategory;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $category = CategoryService::find($this->idcategory);
        return view('components.categorias.form-edit-category')->with('category', $category);
    }
}

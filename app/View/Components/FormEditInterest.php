<?php

namespace App\View\Components;

use App\Models\Interests;
use Illuminate\View\Component;

class FormEditInterest extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $idinteres;
    public function __construct($idinteres)
    {
        $this->idinteres = $idinteres;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $interest = Interests::find($this->idinteres);
        return view('components.interests.form-edit-interest')->with('interest', $interest);
    }
}

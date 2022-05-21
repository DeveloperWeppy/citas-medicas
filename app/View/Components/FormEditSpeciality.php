<?php

namespace App\View\Components;

use App\Models\Specialty;
use Illuminate\View\Component;

class FormEditSpeciality extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $idspeciality;
    public function __construct($idspeciality)
    {
        $this->idspeciality = $idspeciality;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $speciality = Specialty::find($this->idspeciality);
        return view('components.specialityes.form-edit-speciality')->with('speciality', $speciality);
    }
}

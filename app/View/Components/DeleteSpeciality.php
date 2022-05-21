<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DeleteSpeciality extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $idspeciality, $nombre;
    public function __construct($idspeciality, $nombre)
    {
        $this->idspeciality = $idspeciality;
        $this->nombre = $nombre;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.specialityes.delete-speciality');
    }
}

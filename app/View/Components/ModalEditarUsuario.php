<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ModalEditarUsuario extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    //public $idUser;
    public function __construct()
    {
        //$this->idUser = $idUser;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.usuarios.modal-editar-usuario');
    }
}

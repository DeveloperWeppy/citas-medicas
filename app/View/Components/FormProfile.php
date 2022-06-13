<?php

namespace App\View\Components;

use App\Models\User;
use App\Models\UserInformation;
use Illuminate\View\Component;

class FormProfile extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $idPrestador;
    public function __construct($idPrestador)
    {
        $this->idPrestador = $idPrestador;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $userprestador = UserInformation::find($this->idPrestador);

        $userid = $userprestador->user_id;

        $user = User::find($userid);
        return view('components.perfilprestador.form-profile')->with('user', $user)->with('userprestador', $userprestador);
    }
}

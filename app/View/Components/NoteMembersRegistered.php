<?php

namespace App\View\Components;

use App\Models\Client;
use App\Models\NumbersMembersAvailable;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;

class NoteMembersRegistered extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $cantidadmiembros, $idPlan;
    public function __construct($cantidadmiembros, $idPlan)
    {
        $this->cantidadmiembros = $cantidadmiembros;
        $this->idPlan = $idPlan;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $user_login = Auth::user()->id;
        $consutar_cliente = Client::where('user_id',$user_login)->first();
        $id_client = $consutar_cliente->id;

        $consul_cant_miembros = NumbersMembersAvailable::where('client_id', $id_client)->first();
        $registros_disponibles = $consul_cant_miembros->registered_members;

        
        return view('components.client.miembros.note-members-registered')->with('registros_disponibles', $registros_disponibles);
    }
}

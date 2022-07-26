<?php

namespace App\View\Components;

use App\Models\Client;
use Illuminate\View\Component;
use Illuminate\Support\Facades\DB;
class FormProfileClient extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $idClient;
    public function __construct($idClient)
    {
        $this->idClient = $idClient;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $departamentos = DB::select( 'select * from departamentos'  );
        $cliente = Client::find($this->idClient);
        return view('components.client.perfil.form-profile-client')->with('cliente', $cliente)->with('departamentos', $departamentos);
    }
}

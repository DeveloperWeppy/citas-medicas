<?php

namespace App\View\Components;

use App\Models\Client;
use Illuminate\View\Component;

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
        $cliente = Client::find($this->idClient);
        return view('components.form-profile-client')->with('cliente', $cliente);
    }
}

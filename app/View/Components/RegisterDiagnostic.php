<?php

namespace App\View\Components;

use App\Models\Client;
use Illuminate\View\Component;
use App\Models\RedeemedService;
use Illuminate\Support\Facades\DB;

class RegisterDiagnostic extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $idServiceRedeemed;
    public function __construct($idServiceRedeemed)
    {
        $this->idServiceRedeemed = $idServiceRedeemed;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $servici_reemede = RedeemedService::find($this->idServiceRedeemed);
        $client_id = $servici_reemede->client_id;

        
        $client = Client::find($client_id);
        $name_clien = $client->name;
        $identification_client = $client->number_identication;
        
        return view('components.redimir.register-diagnostic')
            ->with('name_clien', $name_clien)->with('identification_client', $identification_client);
    }
}

<?php

namespace App\View\Components;

use App\Models\Client;
use Illuminate\View\Component;

class CheckRedension extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $clientId;
    public function __construct($clientId)
    {
        $this->clientId = $clientId;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $client = Client::find($this->clientId);

        return view('components.redimir.check-redension')->with('client', $client);
    }
}

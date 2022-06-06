<?php

namespace App\View\Components;

use Illuminate\View\Component;

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
        
        return view('components.redimir.register-diagnostic');
    }
}

<?php

namespace App\View\Components;

use Illuminate\View\Component;

class HorariosAtencion extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($attentioShedule=array())
    {
        $lunes=$martes=$miercoles=$jueves=$viernes=$sabado=$domingo=(object) array('open_morning'=>'','close_morning'=>'','open_afternoon'=>'','close_afternoon'=>'');
        $attentioShedule=json_decode(json_encode($attentioShedule),true);
        if(count($attentioShedule)>0){
          $index=array_search('Lunes', array_column($attentioShedule, 'day'));
          if ($index !== false) {$lunes=(object) $attentioShedule[$index]; }
          $index=array_search('Martes', array_column($attentioShedule, 'day'));
          if ($index !== false) {$martes=(object) $attentioShedule[$index]; }
          $index=array_search('Miercoles', array_column($attentioShedule, 'day'));
          if ($index !== false) {$miercoles= (object)$attentioShedule[$index]; }
          $index=array_search('Jueves', array_column($attentioShedule, 'day'));
          if ($index !== false) {$jueves=(object) $attentioShedule[$index]; }
          $index=array_search('Viernes', array_column($attentioShedule, 'day'));
          if ($index !== false) {$viernes=(object) $attentioShedule[$index]; }
          $index=array_search('Sábado', array_column($attentioShedule, 'day'));
          if ($index !== false) {$sabado=(object) $attentioShedule[$index]; }
          $index=array_search('Domingo', array_column($attentioShedule, 'day'));
          if ($index !== false) {$domingo=(object) $attentioShedule[$index]; }
        }
        $this->attentioShedule=(object) array('lunes'=>$lunes,'martes'=>$martes,'miercoles'=>$miercoles,'jueves'=>$jueves,'viernes'=>$viernes,'sabado'=>$sabado,'domingo'=>$domingo);

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {

        return view('components.horarios-atencion')->with('attentioShedule', $this->attentioShedule);
    }
}

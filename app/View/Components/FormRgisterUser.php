<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Service;
class FormRgisterUser extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($user=array(),$userInformation=array(),$convenio=array(),$attentioShedule=array(),$convenioServices=array())
    {
       $this->user=isset($user->email)? $user:(object) array('id'=>'','name'=>'','email'=>'','logo'=>'#');
       $this->userInformation=isset($userInformation->id)? $userInformation:(object) array('nit'=>'','name'=>'','address'=>'','num_phone'=>'','name_contact'=>'','num_phone_contact'=>'','email_contact'=>'','city'=>'');
       $this->convenio=isset($convenio->start_date)?$convenio:(object) array('start_date'=>'','end_date'=>'');
       $this->attentioShedule=$attentioShedule;
       $this->convenioServices=$convenioServices;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $servicios = Service::where('status', 1)->get();
        return view('components.usuarios.form-rgister-user')->with('servicios', $servicios)->with('user', $this->user)->with('userInformation', $this->userInformation)->with('convenio', $this->convenio)->with('attentioShedule', $this->attentioShedule)->with('convenioServices', $this->convenioServices);
    }
}

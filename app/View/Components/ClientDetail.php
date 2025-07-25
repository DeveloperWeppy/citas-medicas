<?php

namespace App\View\Components;

use App\Models\Client;
use App\Models\MembersClient;
use App\Models\Plan;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\View\Component;

class ClientDetail extends Component
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

    if (!$cliente) {
        return view('components.subscriptores.client-detail')->with('error', 'Cliente no encontrado.');
    }

    $user_id = $cliente->user_id;

    $searchplan = Subscription::where('user_id', $user_id)->first();

    if (!$searchplan) {
        return view('components.subscriptores.client-detail')->with('cliente', $cliente)
                ->with('consultar_miembros', [])
                ->with('name_plan', 'No hay plan asociado.');
    }

    $id_plan = $searchplan->plan_id;
    $plan = Plan::find($id_plan);

    if (!$plan) {
        return view('components.subscriptores.client-detail')->with('cliente', $cliente)
                ->with('consultar_miembros', [])
                ->with('name_plan', 'Plan no encontrado.');
    }

    $name_plan = $plan->name;

    // Asegúrate de que esto devuelva una colección
    $consultar_miembros = MembersClient::where('user_owner_id', $user_id)->get();

    // Verifica si es una colección y está vacía
    if ($consultar_miembros->isEmpty()) {
        return view('components.subscriptores.client-detail')->with('cliente', $cliente)
                ->with('consultar_miembros', [])
                ->with('name_plan', $name_plan);
    }

    $datos = [];
    foreach ($consultar_miembros as $value) {
        $id_miembros = $value->client_id;
        $miembros = Client::where('id', $id_miembros)->get();

        foreach ($miembros as $valuemiembro) {
            $info = array(
                'name' => $valuemiembro->name,
                'last_name' => $valuemiembro->last_name,
                'number_identication' => $valuemiembro->number_identication,
                'photo' => $valuemiembro->photo,
                'email' => $valuemiembro->email,
                'num_phone' => $valuemiembro->num_phone,
                'whatsapp' => $valuemiembro->whatsapp,
                'instagram' => $valuemiembro->instagram,
                'facebook' => $valuemiembro->facebook,
            );

            $datos[] = array('info' => $info);
        }
    }

    return view('components.subscriptores.client-detail')->with('cliente', $cliente)
            ->with('consultar_miembros', $consultar_miembros)
            ->with('datos', $datos)
            ->with('name_plan', $name_plan);
}


    
    public function renderOld()
    {
        $cliente = Client::find($this->idClient);
        $user_id = $cliente->user_id;

        $searchplan = Subscription::where('user_id', $user_id)->first();
        $id_plan = $searchplan->plan_id;

        $plan = Plan::find($id_plan);
        $name_plan = $plan->name;

        $datos= [];
        $consultar_miembros = MembersClient::where('user_owner_id', $user_id)->get();

        if (!$consultar_miembros->isEmpty()) {
            
            foreach ($consultar_miembros as $key => $value) {
               
                $id_miembros = $value->client_id;

                $miembros = Client::where('id',$id_miembros)->get();

                foreach ($miembros as $key => $valuemiembro) {
                    
                    $info = array(
                        'name' => $valuemiembro->name,
                        'last_name' => $valuemiembro->last_name,
                        'number_identication' => $valuemiembro->number_identication,
                        'photo' => $valuemiembro->photo,
                        'email' => $valuemiembro->email,
                        'num_phone' => $valuemiembro->num_phone,
                        'whatsapp' => $valuemiembro->whatsapp,
                        'instagram' => $valuemiembro->instagram,
                        'facebook' => $valuemiembro->facebook,
                    );

                    $datos[] = array(
                        'info' =>$info
                    );
                }
            
            }
           
            return view('components.subscriptores.client-detail')->with('cliente', $cliente)
                    ->with('consultar_miembros', $consultar_miembros)->with('datos', $datos)->with('name_plan', $name_plan);
        }else{
            return view('components.subscriptores.client-detail')->with('cliente', $cliente)
                    ->with('consultar_miembros', $consultar_miembros)->with('name_plan', $name_plan);
        }
        
        
        


    }
}

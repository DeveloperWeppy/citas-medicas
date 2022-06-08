<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\Client;
use App\Models\MembersClient;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\NumbersMembersAvailable;

class MembersClientController extends Controller
{
    public function index()
    {
        $user_login = Auth::user()->id;
        $user_name = Auth::user()->name;

        $info_client = Client::where('user_id', $user_login)->first();
        $is_owner = $info_client->is_owner;

        $consultar_numero_client_for_owner =  NumbersMembersAvailable::where('client_id', $is_owner)->first();
        $total_miembros_por_registrar= $consultar_numero_client_for_owner->registered_members;

        $verificar_subs = Subscription::where('user_id', $user_login)->count();
        $dato = '';
        if ($verificar_subs > 0) {
            $get_subscription = Subscription::where('user_id', $user_login)->first();

            $idplan = $get_subscription->plan_id;

            $plan = Plan::find($idplan);

            $dato = 'valido';
            return view('cliente.miembros.index')->with('plan', $plan)->with('dato', $dato)
            ->with('total_miembros_por_registrar', $total_miembros_por_registrar)->with('is_owner', $is_owner)->with('user_name', $user_name);
        }else{
            $dato = 'invalido';
            return view('cliente.miembros.index')->with('dato', $dato)->with('user_name', $user_name);
        }
    }

    public function getUsuarios()
    {
        $data = array();
        $user_login = Auth::user()->id;

        $miembros_del_cliente = MembersClient::where('user_owner_id',  $user_login)->get();
        foreach ($miembros_del_cliente as $key => $value) {

            $ids_clients = $value->client_id;
            $clientes = Client::where('id', $ids_clients)->get();

            foreach ($clientes as $key => $item) {
                $info = [
                    $item->name,
                    $item->last_name,
                    $item->number_identication,
                    date("Y-m-d H:m", strtotime($value->created_at)),
                    '
                    <button type="button" class="btn btn-xs btn-danger" onclick="eliminarUsuario(' . $value->id . ');"><i class="fas fa-trash"></i></button>
                    '
                ];
    
                $data[] = $info;
            }
            
        } 

        echo json_encode([
            'data' => $data
        ]);
    }
}

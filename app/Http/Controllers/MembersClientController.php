<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\Client;
use App\Models\MembersClient;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\NumbersMembersAvailable;
use App\Models\User;

class MembersClientController extends Controller
{
    public function index()
    {
        $user_login = Auth::user()->id;
        $user_name = Auth::user()->name;

        $info_client = Client::where('user_id', $user_login)->first();
        $is_owner = $info_client->is_owner;

        $consultar_numero_client_for_owner =  NumbersMembersAvailable::where('client_id', $is_owner)->first();
        $total_miembros_por_registrar= isset($consultar_numero_client_for_owner->registered_members) ? $consultar_numero_client_for_owner->registered_members:0;

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
            return view('cliente.miembros.index')->with('dato', $dato)->with('is_owner', $is_owner)->with('user_name', $user_name);
        }
    }

    public function getClientes()
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
                    $item->email,
                    date("Y-m-d H:m", strtotime($value->created_at)),
                    '
                    <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Disabled tooltip">
                    <button type="button" class="btn btn-xs btn-danger" onclick="eliminarMiembro(' . $value->id . ');"><i class="fas fa-trash"></i></button>
                    </span>
                    '
                ];

                $data[] = $info;
            }

        }

        echo json_encode([
            'data' => $data
        ]);
    }

    public function destroy($id)
    {
        $error = false;
        $mensaje = '';

        $user_login = Auth::user()->id;
        $cliente_logueado = Client::where('user_id', $user_login)->first();
        $id_cliente_owner = $cliente_logueado->id;

         $member = MembersClient::find($id);
        $id_client = $member->client_id;

        $cliente = Client::find($id_client);
        $user_id = $cliente->user_id;

        $consultar_numero_client_for_owner =  NumbersMembersAvailable::where('client_id', $id_cliente_owner)->first();
        $total_miembros_registrado = $consultar_numero_client_for_owner->registered_members;
        $id_number_member_available = $consultar_numero_client_for_owner->id;

        $update_status = array(
            'status' => 0
        );

      if (User::findOrFail($user_id)->update($update_status)) {
            $new_member_number = $total_miembros_registrado + 1;

                $update_member_number = array(
                    'registered_members' => $new_member_number,
                );

                if (NumbersMembersAvailable::findOrFail($id_number_member_available)->update($update_member_number)) {
                    if (MembersClient::findOrFail($id)->delete()) {
                        $error = false;
                    }else {
                        $error = true;
                        $mensaje = 'Error! Se presento un problema al eliminar, intenta de nuevo.';
                    }
                }else{
                    $error = true;
                $mensaje = 'Error! Se presento un problema al actualizar el nuevo número de miembros disponibles a registrar.';
                }

        }else {
                $error = true;
                $mensaje = 'Error! Se presento un problema al eliminar el usuario, intenta de nuevo.';
            }

        echo json_encode(array('error' => $error, 'mensaje' => $mensaje));
    }
}

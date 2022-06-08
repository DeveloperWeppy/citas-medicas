<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Client;
use App\Models\MembersClient;
use App\Models\NumbersMembersAvailable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.subscriptores.index');
    }

    public function getClientes()
    {
        $data = array();
        $usuarios = User::with('roles')->whereDoesntHave('roles', function ($query) {
            $query->whereIn('name', ['Admin', 'Gestor', 'Prestador']);
        })->get();
        foreach ($usuarios as $key => $value) {

            $class_status = ($value->status == 1) ? "success" : "danger";
            $text_status = ($value->status == 1) ? "Activo" : "Inactivo";

            $ruta_editar = route('usuarios.edit', $value->id);

            $info = [
                $value->id,
                //$value->roles[0]->name,
                $value->email,
                '<span class="badge bg-' . $class_status . '">' . $text_status . '</span>',
                date("Y-m-d H:m", strtotime($value->created_at)),
                '
                <button type="button" class="btn btn-xs btn-danger" onclick="eliminarUsuario(' . $value->id . ');"><i class="fas fa-info-circle"></i> Ver Más</button>
                '
            ];

            $data[] = $info;
        }

        echo json_encode([
            'data' => $data
        ]);
    }
    
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_member(Request $request)
    {
        $error = false;
        $mensaje = '';

        $user_login = Auth::user()->id;
        $consultar_cliente_propietario = Client::where('user_id', $user_login)->first();
        $id_client_owner = $consultar_cliente_propietario->id;
        
        $validar_email = User::where('email', $request->email)->count();

        $consultar_numero_client_for_owner =  NumbersMembersAvailable::where('client_id', $id_client_owner)->first();
        $total_miembros_registrado = $consultar_numero_client_for_owner->registered_members;
        $id_number_member_available = $consultar_numero_client_for_owner->id;

        if ($total_miembros_registrado == 0) {
            $error = true;
            $mensaje = 'Error! Ya has completado el número de registros de miembros habilitados para tu plan actual';
        } else {
            if ($validar_email > 0) {
                $error = true;
                $mensaje = 'Error! Ya se encuentra registrado un usuario con este correo electronico "' . $request->email . '". Intente con otro.';
            } else {
    
                $register_user = array(
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->number_identication),
                    'pw_decrypte' => $request->number_identication,
                    'status' => 1,
                    'is_prestador' => 0
                );
    
                if ($user_add = User::create($register_user)->assignRole('Cliente')) {
    
                    $id_user = $user_add->id;
    
                    $validar_cliente = Client::where('number_identication', $request->number_identication)->count();
    
                    if ($validar_cliente > 0) {
                        $error = true;
                        $mensaje = 'Error! Ya se encuentra registrado un cliente con el número de identificación "' . $request->number_identication . '". Intente con otro.';
                    } else {
                        $register_client_info = array(
                            'user_id' => $id_user,
                            'name' => $request->name,
                            'last_name' => $request->lastname,
                            'number_identication' => $request->number_identication,
                            'photo' => 'completar',
                            'age' => '0',
                            'date_of_birth' => '1999-09-25',
                            'address' => 'completar',
                            'neighborhood' => 'completar',
                            'email' => $request->email,
                            'num_phone' => 'completar',
                            'is_owner' => 0,
                        );
    
                        if ($add_client = Client::create($register_client_info)) {
                            $id_client = $add_client->id;
    
                            $register_client_member = array(
                                'client_id' => $id_client,
                                'user_owner_id' => $user_login,
                            );
    
                            if (MembersClient::create($register_client_member)) {
                                $new_member_number = $total_miembros_registrado - 1;
                               
                                $update_member_number = array(
                                    'registered_members' => $new_member_number,
                                );

                                if ($plan = NumbersMembersAvailable::findOrFail($id_number_member_available)->update($update_member_number)) {
                                    $error = false;
                                    $mensaje = 'Se ha registrado el nuevo miembro a tu plan exitosamente!';
                                }else{
                                    $error = true;
                                $mensaje = 'Error! Se presento un problema al actualizar el nuevo número de miembros disponibles a registrar.';
                                }

                            } else {
                                $error = true;
                                $mensaje = 'Error! Se presento un problema al registrar el nuevo miembro.';
                            }
                            
                        } else {
                            $error = true;
                            $mensaje = 'Error! Se presento un problema al registrar datos de cliente, intenta de nuevo.';
                        }
                        
                    }
                }
            }
        }
        
        echo json_encode(array('error' => $error, 'mensaje' => $mensaje));
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        //
    }
}

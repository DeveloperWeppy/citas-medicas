<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Convenio;
use Illuminate\Http\Request;
use App\Models\AttentioShedule;
use App\Models\Client;
use App\Models\UserInformation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.users.index');
    }
    public function getUsuarios()
    {
        $data = array();
        $usuarios = User::with('roles')->whereDoesntHave('roles', function ($query) {
            $query->whereIn('name', ['Admin', 'Cliente']);
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
                <a href="' . $ruta_editar . '" class="btn btn-xs btn-success"><i class="fas fa-edit"></i> Editar</a>
                <button type="button" class="btn btn-xs btn-danger" onclick="eliminarUsuario(' . $value->id . ');"><i class="fas fa-trash"></i> Eliminar</button>
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
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $error = false;
        $mensaje = '';

        $contraseña = $request->password;
        $dia = $request->day == null ? 'sin dia' : $request->day;
        $apertura_morning = $request->open_morning == null ? 'sin horario' : $request->open_morning;
        $cierre_morning = $request->close_morning == null ? 'sin horario' : $request->close_morning;
        $apertura_afternoon = $request->open_afternoon == null ? 'sin horario' : $request->open_afternoon;
        $cierre_afternoon = $request->close_afternoon == null ? 'sin horario' : $request->close_afternoon;

        //consulta para validar si ya existe un usuario registrado o no
        $validar_email = User::where('email', $request->email)->count();
        $validar_nit = UserInformation::where('nit', $request->nit)->count();

        if ($validar_email > 0) {
            $error = true;
            $mensaje = 'Error! Ya se encuentra registrado un usuario con este correo electronico "' . $request->email . '". Intente con otro.';
        } else if ($validar_nit > 0) {
            $error = true;
            $mensaje = 'Error! Ya se encuentra registrado un usuario con este nit "' . $request->nit . '".';
        } else {
            # validamos si existe la imagen en el request
            $image = $request->file('imgLogo')->store('public/logosPrestadores');
            $url = Storage::url($image);

            $register_user = array(
                'name' => $request->name,
                'logo' => $url,
                'email' => $request->email,
                'password' => Hash::make($contraseña),
                'pw_decrypte' => $contraseña,
                'status' => 1
            );

            if ($user_add = User::create($register_user)->assignRole('Prestador')) {

                $id_user = $user_add->id;
                $register_user_info = array(
                    'user_id' => $id_user,
                    'nit' => $request->nit,
                    'name' => $request->name,
                    'address' => $request->address,
                    'num_phone' => $request->num_phone,
                    'name_contact' => $request->name_contact,
                    'num_phone_contact' => $request->num_phone_contact,
                    'email_contact' => $request->email_contact,
                    'city' => $request->city,
                );

                if ($responsable = UserInformation::create($register_user_info)) {
                    $id_user_responsable = $responsable->id;
                    $register_convenio = array(
                        'start_date' => $request->start_date,
                        'end_date' => $request->end_date,
                        'responsable_id' => $id_user_responsable,
                    );

                    if (Convenio::create($register_convenio)) {

                        for ($i = 0; $i < 7; ++$i) {
                            //dump((float)$montos[$i]);
    
                            $register_horario_atencion = AttentioShedule::create([
                                'day' => $dia[$i],
                                'open_morning' => $apertura_morning[$i],
                                'close_morning' => $cierre_morning[$i],
                                'open_afternoon' => $apertura_afternoon[$i],
                                'close_afternoon' => $cierre_afternoon[$i],
                                'responsable_id' => $id_user_responsable,
                            ]);
                        }
                        if ($register_horario_atencion->save()) {
                            $error = false;
                        $mensaje = 'Registro Exitoso!';
                        } else {
                            $error = true;
                        $mensaje = 'Error! Se presento un problema al registrar los horarios de atención, intenta de nuevo.';
                        }
                    } else {
                        $error = true;
                        $mensaje = 'Error! Se presento un problema al registrar la Información de convenio, intenta de nuevo.';
                    }
                } else {
                    $error = true;
                    $mensaje = 'Error! Se presento un problema al registrar la Información de contácto, intenta de nuevo.';
                }
            } else {
                $error = true;
                $mensaje = 'Error! Se presento un problema al registras datos de usuario, intenta de nuevo.';
            }
        }
        echo json_encode(array('error' => $error, 'mensaje' => $mensaje));
    }

    public function profile()
    {
        $user_login = Auth::user()->id;
        $user = User::find($user_login);
        
        if ($user->hasRole('Prestador')) {
            $info_prestador = UserInformation::where('user_id', $user_login)->first();

            return view('profile')->with('info_prestador', $info_prestador);

        }else if ($user->hasRole('Cliente')) {
            $info_cliente = Client::where('user_id', $user_login)->first();
            
            return view('profile')->with('info_cliente', $info_cliente);

        }else if ($user->hasRole('Gestor') || $user->hasRole('Admin')) {

            return view('profile')->with('user', $user);
        }
    }
}

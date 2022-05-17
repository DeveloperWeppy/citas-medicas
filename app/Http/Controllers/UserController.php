<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\UserInformation;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $usuarios = User::orderBy('id', 'asc')->get();
            return datatables()->of($usuarios)
                ->addColumn('action', function ($row) {
                    $html = '<button class="btn btn-success" data-toggle="modal" data-target="#modal_EditarDivisa">
                    <i class="fas fa-edit"></i> Editar</button> ';
                    $html .= '<button data-rowid="' . $row->id . '" class="btn btn-xs btn-danger btn-delete">Eliminar</button>';
                    return $html;
                })->toJson();//
        }
        
        return view('admin.users.index');
    }

    public function store(Request $request)
    {
        $error = false;
        $mensaje = '';

        $contraseña = $request->password;

        //consulta para validar si ya existe un usuario registrado o no
        $validar_email = User::where('email', $request->email)->count();
        $validar_nit = UserInformation::where('nit', $request->nit)->count();

        if ($validar_email > 0) {
            $error = true;
            $mensaje = 'Error! Ya se encuentra registrado un usuario con este correo electronico "' . $request->email . '". Intente con otro.';
        } else if ($validar_nit > 0) {
            $error = true;
            $mensaje = 'Error! Ya se encuentra registrado un usuario con este ni "' . $request->nit . '".';
            
            
         } else{
             # validamos si existe la imagen en el request
             $image = $request->file('imgLogo')->store('public/logosPrestadores');
             $url = Storage::url($image);
             
            $register_user = array(
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
                    'nit'=> $request->nit,
                    'name'=> $request->name,
                    'address'=> $request->address,
                    'num_phone'=> $request->num_phone,
                    'name_contact'=> $request->name_contact,
                    'num_phone_contact'=> $request->num_phone_contact,
                    'email_contact'=> $request->email_contact,
                    'city'=> $request->city,
                );

                if (UserInformation::create($register_user_info)) {
                    $error = false;
                    $mensaje = 'Registro Exitoso!';
                } else {
                    $error = true;
                    $mensaje = 'Error! Se presento un problema al registrar los datos, intenta de nuevo.';
                }
                
            } else {
                $error = true;
                $mensaje = 'Error! Se presento un problema al registrar los datos, intenta de nuevo.';
            }
        }
        echo json_encode(array('error' => $error, 'mensaje' => $mensaje));
    }

}

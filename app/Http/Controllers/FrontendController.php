<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\User;
use App\Models\Client;
use Illuminate\Http\Request;
use App\Models\PaymentPlatform;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class FrontendController extends Controller
{
    public function nosotros()
    {

        return view('nosotros');
    }

    public function servicios()
    {

        return view('servicios');
    }

    public function afiliate()
    {

        return view('afiliate');
    }

    public function contacto()
    {

        return view('contacto');
    }

    public function subscribirme()
    {

        return view('subscribirme');
    }

    public function getCiudades(Request $request)
    {
        try {
            $departmen_id = $request->input('departmen_id');
            $departamentos = DB::select(
                'select * from municipios where departamento_id =' . $departmen_id . ''
            );
            $response = ['data' => $departamentos];
        } catch (\Exception $exception) {
            return response()->json(['message' => 'There was an error retrieving the records'], 500);
        }
        return response()->json($response);
    }


    public function finis_subscribe(Request $request)
    {
      /*   $nombre_client = $request->name;
        $last_name = $request->last_name;
        $number_identication = $request->number_identication;
        $date_of_birth = $request->date_of_birth;
        $email = $request->email;
        $num_phone = $request->num_phone;
        $department = $request->department;
        $city = $request->city;
        $address = $request->address;
        $neighborhood = $request->neighborhood;
        $plane = $request->plane;

        $plan = Plan::find($plane);
        $slug = $plan->slug;

        session(['name'=> $nombre_client]);
        session(['name'=> $nombre_client]);
        session(['name'=> $nombre_client]);
        session(['name'=> $nombre_client]);
        session(['name'=> $nombre_client]);
        session(['name'=> $nombre_client]);
        session(['name'=> $nombre_client]);
        session(['name'=> $nombre_client]);
        session(['name'=> $nombre_client]);
        session(['name'=> $nombre_client]);
        session(['name'=> $nombre_client]);

        session()->flash('name', $nombre_client);
        session()->flash('last_name', $last_name);
        session()->flash('number_identication', $number_identication);
        session()->flash('date_of_birth', $date_of_birth);
        session()->flash('email', $email);
        session()->flash('num_phone', $num_phone);
        session()->flash('department', $department);
        session()->flash('city', $city);
        session()->flash('address', $address);
        session()->flash('neighborhood', $neighborhood);
        session()->flash('plane', $plane);
        session()->flash('slug', $slug); */

        return view('confirmsubscribe');
    }

    public function store_client(Request $request)
    {
        $error = false;
        $mensaje = '';

        $nombre_client = $request->name;
        session(['name'=> $nombre_client]);
  /*    session('name', $nombre_client);
        session()->flash('last_name', $last_name);
        session()->flash('number_identication', $number_identication);
        session()->flash('date_of_birth', $date_of_birth);
        session()->flash('email', $email);
        session()->flash('num_phone', $num_phone);
        session()->flash('department', $department);
        session()->flash('city', $city);
        session()->flash('address', $address);
        session()->flash('neighborhood', $neighborhood);
        session()->flash('plane', $plane);
        session()->flash('slug', $slug); */ 

        $correo = $request->email;
        $num_cedula = $request->number_identication;

        //consulta para validar si ya existe un usuario registrado o no
        $validar_email = User::where('email', $correo)->count();
        $validar_cedula = Client::where('number_identication', $num_cedula)->count();

        if ($validar_email > 0) {
            $error = true;
            $mensaje = 'Error! Ya se encuentra registrado un usuario con este correo electronico "' . $correo . '". Intente con otro.';
        } else if ($validar_cedula > 0) {
            $error = true;
            $mensaje = 'Error! Ya se encuentra registrado un usuario con este documento "' . $num_cedula . '".';
        } else {
            # validamos si existe la imagen en el request
            // $image = $request->file('imgLogo')->store('public/clients');
            // $url = Storage::url($image);

            $register_user = array(
                'name' => $request->name,
                'email' => $correo,
                'password' => Hash::make($num_cedula),
                'pw_decrypte' => $num_cedula,
                'status' => 1,
                'is_prestador' => 0,
            );

            if ($user_add = User::create($register_user)->assignRole('Cliente')) {
                $id_user = $user_add->id;

                $register_client_info = array(
                    'user_id' => $id_user,
                    'name' => $request->name,
                    'last_name' => $request->last_name,
                    'number_identication' => $request->number_identication,
                    'type_identication' => 'C.C',
                    'photo' => 'null',
                    'age' => '0',
                    'date_of_birth' => $request->date_of_birth,
                    'address' => $request->address,
                    'neighborhood' => $request->neighborhood,
                    'email' => $correo,
                    'department' =>  $request->department,
                    'city' =>  $request->city,
                    'num_phone' => $request->num_phone,
                    'is_owner' => 0,
                );

                if ($responsable = Client::create($register_client_info)) {
                    $id_user_responsable = $responsable->id;
                    //$user_add->sendEmailVerificationNotification();

                    $error = false;
                    $mensaje = 'Registro Exitoso!';
                } else {
                    $error = true;
                    $mensaje = 'Error! Se presento un problema en el registro.';
                }
            } else {
                $error = true;
                $mensaje = 'Error! Se presento un problema en los datos de registro, intenta de nuevo.';
            }
        }
        echo json_encode(array('error' => $error, 'mensaje' => $mensaje));
    }
}

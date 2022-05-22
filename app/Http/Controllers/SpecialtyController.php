<?php

namespace App\Http\Controllers;

use App\Models\Specialty;
use Illuminate\Http\Request;

class SpecialtyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $specialityes = Specialty::get();
        return view('admin.specialityes.index')->with('specialityes', $specialityes);;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


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
    public function store(Request $request)
    {
        $error = false;
        $mensaje = '';

        $namespeciality = $request->name;
        $validar_speciality = Specialty::where('name', $namespeciality)->count();

        if ($validar_speciality > 0) {
            $error = true;
            $mensaje = 'Error! Ya se encuentra registrada la especialidad "' . $namespeciality;
        } else {

            $register_speciality = array(
                'name' => $namespeciality,
                'description' => $request->description,
                'observation' => $request->observation,
            );

            if (Specialty::create($register_speciality)) {
                $error = false;
                $mensaje = 'Registro de Especialidad Exitoso!';
            } else {
                $error = true;
                $mensaje = 'Error! Se presento un problema al registrar la especialidad, intenta de nuevo.';
            }
        }
        echo json_encode(array('error' => $error, 'mensaje' => $mensaje));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Specialty  $specialty
     * @return \Illuminate\Http\Response
     */
    public function show(Specialty $specialty)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Specialty  $specialty
     * @return \Illuminate\Http\Response
     */
    public function edit(Specialty $specialty)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Specialty  $specialty
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Specialty $specialty)
    {
        $error = false;
        $mensaje = '';

        $namespeciality = $request->name;
        $validar_categoria = Specialty::where('name', $namespeciality)->count();

        if ($validar_categoria > 0) {
            $error = true;
            $mensaje = 'Error! Ya se encuentra registrada la especialidad "' . $namespeciality;
        } else {

            $update_speciality = array(
                'name' => $namespeciality,
                'description' => $request->description,
                'observation' => $request->observation,
            );

            if (Specialty::findOrFail($request->id)->update($update_speciality)) {
                $error = false;
                $mensaje = 'Especialidad Actualizada Exitosamente!';
            } else {
                $error = true;
                $mensaje = 'Error! Se presento un problema al registrar la especialidad, intenta de nuevo.';
            }
        }
        echo json_encode(array('error' => $error, 'mensaje' => $mensaje));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Specialty  $specialty
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $error = false;
        $mensaje = '';

        if (Specialty::findOrFail($id)->delete()) {
            $error = false;
        } else {
            $error = true;
            $mensaje = 'Error! Se presento un problema al eliminar, intenta de nuevo.';
        }

        echo json_encode(array('error' => $error, 'mensaje' => $mensaje));
    }
}

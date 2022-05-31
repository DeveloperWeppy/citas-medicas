<?php

namespace App\Http\Controllers;

use App\Models\Interests;
use App\Models\InterestsClient;
use Illuminate\Http\Request;

class InterestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $intereses = Interests::get();
        return view('admin.intereses.index')->with('intereses', $intereses);
    }

    public function view()
    {
        $intereses = InterestsClient::get();
        return view('cliente.intereses.index')->with('intereses', $intereses);
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

        $nameinterest = $request->name;
        $validar_interest = Interests::where('name', $nameinterest)->count();

        if ($validar_interest > 0) {
            $error = true;
            $mensaje = 'Error! Ya se encuentra registrado el interés "' . $nameinterest;
        } else {

            $register_interest = array(
                'name' => $nameinterest,
                'description' => $request->description,
                'category_id' => $request->category_id,
            );

            if (Interests::create($register_interest)) {
                $error = false;
                $mensaje = 'Registro de Interés Exitoso!';
            } else {
                $error = true;
                $mensaje = 'Error! Se presento un problema al registrar el interés, intenta de nuevo.';
            }
        }
        echo json_encode(array('error' => $error, 'mensaje' => $mensaje));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Interests  $interests
     * @return \Illuminate\Http\Response
     */
    public function show(Interests $interests)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Interests  $interests
     * @return \Illuminate\Http\Response
     */
    public function edit(Interests $interests)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Interests  $interests
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Interests $interests)
    {
        $error = false;
        $mensaje = '';

        $nameinterest = $request->name;

            $update_interest = array(
                'name' => $nameinterest,
                'description' => $request->description,
            );

            if (Interests::findOrFail($request->id)->update($update_interest)) {
                $error = false;
                $mensaje = 'Interés Actualizado Exitosamente!';
            } else {
                $error = true;
                $mensaje = 'Error! Se presento un problema al actualizar los datos del interés, intenta de nuevo.';
            }
        echo json_encode(array('error' => $error, 'mensaje' => $mensaje));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Interests  $interests
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $error = false;
        $mensaje = '';

        if (Interests::findOrFail($id)->delete()) {
            $error = false;
        } else {
            $error = true;
            $mensaje = 'Error! Se presento un problema al eliminar, intenta de nuevo.';
        }

        echo json_encode(array('error' => $error, 'mensaje' => $mensaje));
    }
}

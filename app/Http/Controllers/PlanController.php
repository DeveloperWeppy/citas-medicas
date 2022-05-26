<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\PlanServices;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.planes.index');
    }

    public function getPlanes()
    {
        $data = array();
        $is_group = '';
        $planes = Plan::get();
        foreach ($planes as $key => $value) {

            $class_status = ($value->status == 1) ? "success" : "danger";
            $text_status = ($value->status == 1) ? "Activo" : "Inactivo";

            $ruta_editar = route('plane.edit', $value->id);
            $ruta_view_plan = route('plane.show', $value->id);

            if ($value->is_groupd == 0) {
                $is_group = 'No';
            } else {
                $is_group = 'Sí';
            }

            $info = [
                $value->id,
                '<a href="' . $ruta_view_plan . '" class="text-info">' .  $value->name .'</a>',
                self::convertirVa($value->price),
                '<span class="badge bg-' . $class_status . '">' . $text_status . '</span>',
                $is_group,
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

    function convertirVa($monto){
        $valor = number_format($monto, 2, ',', '.');
        return $valor;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.planes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $type_plan = 0;
        $cantidad_personas = 0;
        $error = false;
        $mensaje = '';

        $name_plan = $request->name;
        $group_or_no = $request->is_group;
        //consulta para validar si ya existe un usuario registrado o no
        $validar_name= Plan::where('name', $name_plan)->count();
        $servicios = $request->servicios;

        if ($group_or_no == "on") {
            $type_plan = 1;
            $cantidad_personas = $request->cant_people;
        } else {
            $type_plan = 0;
            $cantidad_personas = 1;
        }
        

        if ($validar_name > 0) {
            $error = true;
            $mensaje = 'Error! Ya se encuentra registrado el plan "' . $name_plan . '". Intente con otro.';
        } else if($servicios == null) {
            $error = true;
            $mensaje = 'Error! No seleccionaste ningún servicio para este plan';
        }else {
            $register_plan = array(
                'name' => $request->name,
                'slug' => $request->name,
                'price' => $request->price,
                'duration_in_days' => $request->duration_in_days,
                'is_group' => $type_plan,
                'cant_people' => $cantidad_personas,
                'status' => 1,
                'description' => $request->description,
            );

            if ($plan = Plan::create($register_plan)) {
                $id_plan = $plan->id;
                for ($i = 0; $i < sizeof($servicios); ++$i) {

                    $register_plans_services = PlanServices::create([
                        'plan_id'  => $id_plan,
                        'service_id'  => $servicios[$i],
                    ]);
                }

                if ($register_plans_services->save()) {
                    $error = false;
                    $mensaje = 'Registro Exitoso!';
                } else {
                    $error = true;
                    $mensaje = 'Error! Se presentó un problema al registrar este plan, intenta de nuevo.';
                }
            }else{
                $error = true;
                $mensaje = 'Error! Se presentó un problema al registrar este plan, intenta de nuevo.';
            }
        }
        echo json_encode(array('error' => $error, 'mensaje' => $mensaje));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $plan = Plan::findOrFail($id);
        return view('admin.planes.show')->with('plan', $plan);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $plan = Plan::findOrFail($id);
        return view('admin.planes.edit')->with('plan', $plan);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plan $plan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plan $plan)
    {
        //
    }
}

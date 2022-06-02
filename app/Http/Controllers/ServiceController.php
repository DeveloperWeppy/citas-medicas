<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Specialty;
use Illuminate\Http\Request;
use App\Models\CategoryService;
use App\Models\UserInformation;
use App\Models\ConvenioServices;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.services.index');
    }

    public function getServicios()
    {
        $data = array();
        $usuarios = Service::get();
        foreach ($usuarios as $key => $value) {

            $class_status = ($value->status == 1) ? "success" : "danger";
            $text_status = ($value->status == 1) ? "Activo" : "Inactivo";

            $ruta_view_service = route('servicios.show', $value->id);
            $ruta_editar = route('servicios.edit', $value->id);

            $valor = 0;

            if ($value->price_discount != null && $value->percentage_discount == null) {
                $valor = self::convertirVa($value->price_discount);
            } else if ($value->price_discount == null && $value->percentage_discount != null) {
                $valor = $value->percentage_discount . '%';
            }

            $info = [
                $value->id,
                '<a href="' . $ruta_view_service . '" class="text-info">' .  $value->name . '</a>',
                self::convertirVa($value->price_normal),
                $valor,
                '<span class="badge bg-' . $class_status . '">' . $text_status . '</span>',
                $value->start_date,
                $value->end_date,
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.services.create');
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
        $name_service = $request->name;
        $category_id = $request->category_id;
        $responsable_convenio = $request->convenios;
        //consulta para validar si ya existe un usuario registrado o no
        $validar_name = Service::where('name', $name_service)->count();

        if ($validar_name > 0) {
            $error = true;
            $mensaje = 'Error! Ya se encuentra registrado el servicio "' . $name_service . '". Intente con otro.';
        } else if ($responsable_convenio == null) {
            $error = true;
            $mensaje = 'Error! No seleccionaste ningún convenio para este servicio';
        } else {
            $register_service = array(
                'name' => $request->name,
                'description' => $request->description,
                'price_normal' => $request->price_normal,
                'price_discount' => $request->price_discount,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'percentage_discount' => $request->percentage_discount,
                'observation' => $request->observation,
                'status' => 1,
                'category_id' => $category_id,
                'specialty_id' => $request->specialty_id,
            );

            if ($servicio = Service::create($register_service)) {
                $id_service = $servicio->id;
                for ($i = 0; $i < sizeof($responsable_convenio); ++$i) {

                    $register_services_prestador = ConvenioServices::create([
                        'convenio_id'  => $responsable_convenio[$i],
                        'service_id'  => $id_service,
                    ]);
                }

                if ($register_services_prestador->save()) {
                    $error = false;
                    $mensaje = 'Registro Exitoso!';
                } else {
                    $error = true;
                    $mensaje = 'Error! Se presento un problema al registrar los prestadores del servicio, intenta de nuevo.';
                }
            } else {
                $error = true;
                $mensaje = 'Error! Se presento un problema al registrar el servicio, intenta de nuevo.';
            }
        }
        echo json_encode(array('error' => $error, 'mensaje' => $mensaje));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $service = Service::findOrFail($id);
        return view('admin.services.show')->with('service', $service);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //edit service
        $service = Service::findOrFail($id);

        return view('admin.services.edit')->with('service', $service);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $error = false;
        $mensaje = '';

        $estado = 0;

        $id_Service = $request->id;
        $name_service = $request->name;
        $category_id = $request->category_id;
        $responsable_convenio = $request->convenios;

        $status_service = $request->statuss;

        if ($status_service == "on") {
            $estado = 1;
        } else {
            $estado = 0;
        }

        //consulta para validar si ya existe un servicio registrado o no
        $validar_name = Service::where('name', $name_service)->where('id', '<>', $id_Service)->get()->count();

        if ($validar_name > 0) {
            $error = true;
            $mensaje = 'Error! Ya se encuentra registrado el servicio "' . $name_service . '". Intente con otro.';
        } else if ($responsable_convenio == null) {
            $error = true;
            $mensaje = 'Error! No seleccionaste ningún convenio para este servicio';
        } else {
            $update_service = array(
                'name' => $request->name,
                'description' => $request->description,
                'price_normal' => $request->price_normal,
                'price_discount' => $request->price_discount,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'percentage_discount' => $request->percentage_discount,
                'observation' => $request->observation,
                'status' => $estado,
                'category_id' => $category_id,
                'specialty_id' => $request->specialty_id,
            );

            if ($servicio = Service::findOrFail($id_Service)->update($update_service)) {
                //$id_service = $servicio->id;

                $register_services_prestador = array();
                for ($i = 0; $i < sizeof($responsable_convenio); ++$i) {
                    $exists_convenio_service = ConvenioServices::where('service_id', $request->id)->where('convenio_id', $responsable_convenio[$i])->count();

                    if ($exists_convenio_service == 0) {
                        $register_services_prestador = ConvenioServices::create([
                            'convenio_id'  => $responsable_convenio[$i],
                            'service_id'  => $request->id,
                        ]);
                        $error = false;
                        $mensaje = 'Actualización de Servicio Exitoso!';
                    }
                }

                /*  if ($register_services_prestador->save()) {
                    $error = false;
                    $mensaje = 'Actualización de Servicio Exitoso!';
                } else {
                    $error = true;
                    $mensaje = 'Error! Se presento un problema al registrar los prestadores del servicio, intenta de nuevo.';
                } */
            } else {
                $error = true;
                $mensaje = 'Error! Se presento un problema al registrar el servicio, intenta de nuevo.';
            }
        }
        echo json_encode(array('error' => $error, 'mensaje' => $mensaje));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        //
    }

    function convertirVa($monto){
        $valor = number_format($monto, 2, ',', '.');
        return $valor;
    }
}

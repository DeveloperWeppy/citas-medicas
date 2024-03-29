<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\Client;
use App\Models\PlanServices;
use App\Models\Subscription;
use App\Models\ServicesFree;
use App\Models\DetailSubscription;
use App\Models\ConvenioServices;
use App\Models\UserInformation;
use App\Models\Convenio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\NumbersMembersAvailable;

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

    public function index_client()
    {
        $user_login = Auth::user()->id;
        $user_name = Auth::user()->name;

        $info_client = Client::where('user_id', $user_login)->first();
        $is_owner = $info_client->is_owner;

        $consultar_numero_client_for_owner =  NumbersMembersAvailable::where('client_id', $is_owner)->first();
        $total_miembros_por_registrar= isset($consultar_numero_client_for_owner->registered_members) ?$consultar_numero_client_for_owner->registered_members:0 ;

        $verificar_subs = Subscription::where('user_id', $user_login)->get();
        $dato = '';
        $plan=(object) array('name'=>'','id'=>'', 'is_group' => 0);
        if (count($verificar_subs) > 0) {
            $detailSubscription = DetailSubscription::where(['user_id'=>$user_login,'status_operation'=>'authorized'])->orderBy('next_payment_date', 'desc')->get();
            if(count($detailSubscription)>0){
                 $get_subscription= Subscription::find($detailSubscription[0]->suscription_id);
                 $idplan = $get_subscription->plan_id;
            }else{
                $idplan = $verificar_subs[0]->plan_id;
            }
            $plan = Plan::find($idplan);

            $dato = 'valido';
            return view('cliente.plan.index')->with('plan', $plan)->with('dato', $dato)
                        ->with('total_miembros_por_registrar', $total_miembros_por_registrar)->with('is_owner', $is_owner)->with('user_name', $user_name);
        }else{
            $dato = 'invalido';
            return view('cliente.plan.index')->with('dato', $dato)->with('user_name', $user_name)->with('is_owner', $is_owner)->with('plan', $plan);
        }

    }

    public function getPlanes()
    {
        $data = array();
        $grupo = '';
        $planes = Plan::get();
        foreach ($planes as $key => $value) {

            $class_status = ($value->status == 1) ? "success" : "danger";
            $text_status = ($value->status == 1) ? "Activo" : "Inactivo";

            $ruta_editar = route('plane.edit', $value->id);
            $ruta_view_plan = route('plane.show', $value->id);

            if ($value->is_group == 0) {
                $grupo = 'No';
            } else {
                $grupo = 'Sí';
            }
            $info = [
                $value->id,
                '<a href="' . $ruta_view_plan . '" class="text-info">' .  $value->name .'</a>',
                self::convertirVa($value->price),
                '<span class="badge bg-' . $class_status . '">' . $text_status . '</span>',
                $grupo,
                '
                <a href="' . $ruta_editar . '" class="btn btn-xs btn-success"><i class="fas fa-edit"></i> Editar</a>

                '
            ];/*<button type="button" class="btn btn-xs btn-danger" onclick="eliminarUsuario(' . $value->id . ');"><i class="fas fa-trash"></i> Eliminar</button>*/

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
        $plantipo = '';

        $name_plan = $request->name;
        $group_or_no = $request->is_group;
        $tipo_plan = $request->type_plan;
        //consulta para validar si ya existe un plan registrado o no
        $validar_name= Plan::where('name', $name_plan)->count();
        $servicios = $request->servicios;

        if ($group_or_no == "on") {
            $type_plan = 1;
            $cantidad_personas = $request->cant_people;
        } else {
            $type_plan = 0;
            $cantidad_personas = 1;
        }

        if ($tipo_plan == "on") {
            $plantipo = 'Anual';
        } else {
            $plantipo = 'Mensual';
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
                'type_plan' => $plantipo,
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
                if(isset($request->free_servicio_id)){
                  foreach ($request->free_servicio_id as $index => $rowid) {
                     foreach ($request->userInf[$rowid] as  $rowid2) {
                           $register_convenio_servicio = ServicesFree::create([
                               'duration_in_days' =>  $request->duration_day[$index],
                               'service_id' =>  $request->free_servicio_id[$index],
                               'plan_id' => $id_plan,
                               'convenio_id' =>$rowid2,
                               'cantidad_redimido' =>$request->cantidadRedimido[$index],
                           ]);
                     }
                  }
                }
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
        $type_plan = 0;
        $estado = 0;
        $cantidad_personas = 0;
        $error = false;
        $mensaje = '';

        $id_plan = $request->id;
        $name_plan = $request->name;
        $group_or_no = $request->is_group;
        //consulta para validar si ya existe un plan registrado o no

        $validar_name = Plan::where('name', $name_plan)->where('id', '<>', $id_plan)->get()->count();

        $servicios = $request->servicios;

        if ($group_or_no == "on") {
            $type_plan = 1;
            $cantidad_personas = $request->cant_people;
        } else {
            $type_plan = 0;
            $cantidad_personas = 1;
        }

        $status_plan = $request->statuss;

        if ($status_plan == "on") {
            $estado = 1;
        } else {
            $estado = 0;
        }


        if ($validar_name > 0) {
            $error = true;
            $mensaje = 'Error! Ya se encuentra registrado el plan "' . $name_plan . '". Intente con otro.';
        } else if($servicios == null) {
            $error = true;
            $mensaje = 'Error! No seleccionaste ningún servicio para este plan';
        }else {
            $update_plan = array(
                'name' => $request->name,
                'slug' => $request->name,
                'price' => $request->price,
                'duration_in_days' => $request->duration_in_days,
                'is_group' => $type_plan,
                'cant_people' => $cantidad_personas,
                'status' => $estado,
                'description' => $request->description,
            );

            if ($plan = Plan::findOrFail($id_plan)->update($update_plan)) {
                $servicesFree= ServicesFree::where('plan_id', $id_plan)->get();
                $servicesFree=json_decode(json_encode($servicesFree),true);
                if(isset($request->free_servicio_id)){
                      $keyConv=array_keys($request->userInf);
                       foreach ($request->free_servicio_id as $index => $rowid) {
                              $arrayT=$keyConv[$index];
                              $ifExist=array_search($request->free_servicio_id[$index], array_column($servicesFree, 'service_id'));
                              if ($ifExist === false && $request->free_servicio_id[$index]!="" ) {
                                    foreach ($request->userInf[$arrayT] as  $rowid2) {
                                        $register_convenio_servicio = ServicesFree::create([
                                            'duration_in_days' =>  $request->duration_day[$index],
                                            'service_id' =>  $request->free_servicio_id[$index],
                                            'plan_id' => $id_plan,
                                            'convenio_id' =>$rowid2,
                                            'cantidad_redimido' =>$request->cantidadRedimido[$index],
                                        ]);
                                      }
                              }else{
                                  foreach ($request->userInf[$arrayT] as  $rowid2) {
                                         $ifAgregar=0;
                                         foreach ($servicesFree as  $rowid3) {
                                              if( $rowid2== $rowid3["convenio_id"] && $rowid3["service_id"]==$rowid){
                                                $ifAgregar=1;
                                              }
                                         }
                                         if($ifAgregar==0){
                                           $register_convenio_servicio = ServicesFree::create([
                                               'duration_in_days' =>  $request->duration_day[$index],
                                               'service_id' =>  $request->free_servicio_id[$index],
                                               'plan_id' => $id_plan,
                                               'convenio_id' =>$rowid2,
                                               'cantidad_redimido' =>$request->cantidadRedimido[$index],
                                           ]);
                                         }
                                  }
                              }
                       }
                       foreach ($servicesFree as $index => $rowid) {
                             $ifEliminar=array_search($servicesFree[$index]['service_id'],$request->free_servicio_id);
                             if ($ifEliminar === false) {
                                 if (ServicesFree::findOrFail($servicesFree[$index]['id'])->delete()){}
                             }else{
                                 $arrayT=$keyConv[$ifEliminar];
                                 $ifExist2= array_search($rowid["convenio_id"],$request->userInf[$arrayT]);
                                 if ($ifExist2 === false) {
                                    if (ServicesFree::findOrFail($servicesFree[$index]['id'])->delete()){}
                                 }else{
                                   $register_services_free = ServicesFree::where('id',$servicesFree[$index]['id'])->update([
                                       'duration_in_days' => $request->duration_day[$ifEliminar],
                                       'cantidad_redimido' =>$request->cantidadRedimido[$ifEliminar],
                                   ]);
                                 }
                             }

                       }
                }
                for ($i = 0; $i < sizeof($servicios); ++$i) {
                    $register_plans_services = PlanServices::updateOrCreate([
                        'plan_id'  => $id_plan,
                        'service_id'  => $servicios[$i],
                    ]);
                }

                if ($register_plans_services->save()) {
                    $error = false;
                    $mensaje = 'Actualización de Plan Exitoso!!';
                } else {
                    $error = true;
                    $mensaje = 'Error! Se presentó un problema al registrar este plan, intenta de nuevo.';
                }
            }else{
                $error = true;
                $mensaje = 'Error! Se presentó un problema al registrar este plan, intenta de nuevo.';
            }
        }
        echo json_encode(array('error' => $error, 'mensaje' => $mensaje, 'dato' => $request->statuss));
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
    public function getConvenios($id)
    {
        $arrayId=array();
        $arrayIdC=array();
        $arrayUserInf=array();
        $convenioServices = ConvenioServices::where('service_id', $id)->get(['convenio_id']);
        foreach ($convenioServices as $value){array_push($arrayId,$value->convenio_id);}
        $convenio = Convenio::whereIn('id',$arrayId)->get(['id','responsable_id']);
        $arrayId=array();
        foreach ($convenio as $value){array_push($arrayId,$value->responsable_id);array_push($arrayIdC,array("res"=>$value->responsable_id,"id"=>$value->id));}
        $userInformation = UserInformation::whereIn('id', $arrayId)->get(['id','name']);
        foreach ($userInformation as $index =>$value){
          $ifExist = array_search($value->id, array_column($arrayIdC, 'res'));
          $arrayUserInf[$index]['id']=$arrayIdC[$ifExist]["id"];
          $arrayUserInf[$index]['text']=$value->name;
        }
        echo json_encode($arrayUserInf);
    }
}

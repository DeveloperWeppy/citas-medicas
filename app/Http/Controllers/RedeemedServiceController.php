<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Client;
use Illuminate\Http\Request;
use App\Models\RedeemedService;
use Illuminate\Support\Facades\DB;

class RedeemedServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.redimidos.index');
    }

    public function getRedimidos()
    {
        $data = array();
        $redimidos = RedeemedService::get();
        foreach ($redimidos as $key => $value) {

            $info = [
                $value->id,
                $value->find($value->id)->nombre_cliente->name,
                $value->find($value->id)->nombre_servicio->name,
                $value->created_at,
            ];

            $data[] = $info;
        }

        echo json_encode([
            'data' => $data
        ]);
    }

    public function search(Request $request)
    {
        $data = trim($request->valor);
        $result = DB::table('clients')
        ->where('name','like','%'.$data.'%')
        ->orwhere('number_identication','like','%'.$data.'%')
        ->limit(5)
        ->get();
        return response()->json([
            "estado"=>1,
            "result" => $result
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function redimir($id)
    {
        $consultar_user = Client::find($id);
        $user_id = $consultar_user->user_id;
        $name_client= $consultar_user->name;

        $subscrito = '';
        $client_id = $id;

        if (!optional($user_id)->hasActiveSubscription()) {
            $subscrito = 'si';
        }else{
            $subscrito = 'no';
        }
        //dd($subscrito);
        return view('admin.redimidos.redimir')->with('subscrito', $subscrito)
                    ->with('name_client', $name_client)->with('client_id', $client_id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RedeemedService  $redeemedService
     * @return \Illuminate\Http\Response
     */
    public function show(RedeemedService $redeemedService)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RedeemedService  $redeemedService
     * @return \Illuminate\Http\Response
     */
    public function edit(RedeemedService $redeemedService)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RedeemedService  $redeemedService
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RedeemedService $redeemedService)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RedeemedService  $redeemedService
     * @return \Illuminate\Http\Response
     */
    public function destroy(RedeemedService $redeemedService)
    {
        //
    }
}

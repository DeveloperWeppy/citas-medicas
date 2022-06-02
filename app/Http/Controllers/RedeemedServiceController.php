<?php

namespace App\Http\Controllers;

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
        $result = DB::table('users')
        ->where('name','like','%'.$data.'%')
        //->orwhere('barcode','like','%'.$data.'%')
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

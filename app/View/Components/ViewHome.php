<?php

namespace App\View\Components;

use App\Models\Plan;
use App\Models\User;
use App\Models\Client;
use App\Models\Convenio;
use App\Models\ConvenioServices;
use App\Models\Service;
use Illuminate\View\Component;
use App\Models\RedeemedService;
use App\Models\UserInformation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ViewHome extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $planes = Plan::count();
        $servicios = Service::count();
        $convenios = UserInformation::count();
        $clientes = Client::count();

        $user_login = Auth::user()->id;
        $user = User::find($user_login);
        $datos_vista = [];
        
        if ($user->hasRole('Cliente')) {
            $cliente = Client::where('user_id', $user_login)->first();
            $id_client = $cliente->id;
            
            $cant_servi_redeemed = RedeemedService::where('client_id', $id_client)->count();
            $ervi_redeemed = RedeemedService::where('client_id', $id_client)->get();

            foreach ($ervi_redeemed as $key => $value) {
                $prestador_id = $value->prestador_id;
                $servicio_id = $value->service_id;

                $convenio = Convenio::where('responsable_id', $prestador_id)->get();

                foreach ($convenio as $key => $item) {
                    $id_convenio = $item->id;

                    $sql = DB::table('convenio_services')
                        ->select(DB::raw('sum(price_normal) as precio_n, sum(price_discount) as precio_d'))
                        ->where('convenio_id', $id_convenio)
                        ->where('service_id', $servicio_id)
                        ->get();
    
                        $precio_normal = $sql[0]->precio_n;
                        $precio_discount = $sql[0]->precio_d;
    
                        $datos = array(
                            'precio_normal' => $precio_normal,
                            'precio_discount' => $precio_discount
                        );
    
                        $datos_vista[] = array(
                            "datos" => $datos,
                        );
                }
               

            }
            $tota_precios_normales = 0;
            $tota_precios_descuentos = 0;
            $tota_ahorrado = 0;
            foreach ($datos_vista as $key => $value) {
                    $tota_precios_normales += $value['datos']['precio_normal'];
                    $tota_precios_descuentos += $value['datos']['precio_discount'];
            }
            $tota_ahorrado = $tota_precios_normales - $tota_precios_descuentos;
            return view('components.view-home')
            ->with('cant_servi_redeemed', $cant_servi_redeemed)
            ->with('tota_precios_normales', $tota_precios_normales)
            ->with('tota_precios_descuentos', $tota_precios_descuentos)
            ->with('tota_ahorrado', $tota_ahorrado);
        }else{
            return view('components.view-home')
            ->with('planes', $planes)
            ->with('servicios', $servicios)
            ->with('convenios', $convenios)
            ->with('clientes', $clientes);
        }

        



       
    }
}

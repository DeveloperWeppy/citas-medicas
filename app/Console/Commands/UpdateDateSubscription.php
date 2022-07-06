<?php

namespace App\Console\Commands;

use App\Models\DetailSubscription;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class UpdateDateSubscription extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'suscripcion:consultaryactualizarsuscripcion';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Se consulta cada usuario para validar la fecha de proximo pago con la fecha actual';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $suscripciones = DetailSubscription::get();

        foreach ($suscripciones as $key => $value) {
            # id operation of subscriptions...

            $id_subscription = $value->operation_id;

             //consultar suscripción por id de operación
            $response = Http::withToken(config('services.mercadopago.token'))->get('https://api.mercadopago.com/preapproval/search', [
                'limit' => 100,
                'q' => $id_subscription,
            ])->json();
        }
       
    }
}

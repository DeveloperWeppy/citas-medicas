<?php

namespace App\Console\Commands;

use App\Models\DetailSubscription;
use App\Models\Subscription;
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
      $DetailSubscription = DetailSubscription::where('status_operation','authorized')->get();
      $arraySuscripcionesId=array();
      foreach ($DetailSubscription as $key => $value) {
               if ($value->next_payment_date < now()->toDateString()) {
                 $response = Http::withHeaders(['Authorization' => 'Bearer TEST-3372762080079061-062916-f3ee0273a07bfe57eec1acfaf08d3f20-148994351'])->get('https://api.mercadopago.com/preapproval/search', [
                     'limit' => 100,
                     'q' => $value->operation_id,
                 ])->json();
                 if(count($response['results'])>0){
                   if ($register_subscriptions =Subscription::where('id', $value->suscription_id)->update(['next_payment'=>date("Y-m-d", strtotime($response['results'][0]['next_payment_date']))])) {
                       $register_Detail_ubscription = DetailSubscription::where('id', $value->id)->update([
                                 'payer_id' => $response['results'][0]['payer_id'],
                                 'status_operation' =>$response['results'][0]['status'],
                                 'next_payment_date' =>date("Y-m-d H:i:s", strtotime($response['results'][0]['next_payment_date'])),
                                 'payment_method_id' => $response['results'][0]['payment_method_id'],
                                 'payer_first_name' => $response['results'][0]['payer_first_name'],
                                 'payer_last_name' => $response['results'][0]['payer_last_name'],
                                 'preapproval_plan_id' =>$response['results'][0]['preapproval_plan_id'],
                       ]);
                   }
                 }
           }
      }
      return 1;
    }
}

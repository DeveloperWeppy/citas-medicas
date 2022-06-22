<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Traits\ConsumesExternalServices;

//esta clase tenddrá la capacidad de realizar peticiones a través de trais definido
class MercadoPagoService
{
    use ConsumesExternalServices;

    protected $baseUri;

    protected $key;

    protected $secret;

    protected $baseCurrency;

    protected $converter;

    public function __construct()
    {
        $this->baseUri = config('services.mercadopago.base_uri');
        $this->key = config('services.mercadopago.key');
        $this->secret = config('services.mercadopago.secret');
        $this->baseCurrency  = config('services.mercadopago.base_currency');
        
    }

    public function resolveAuthorization(&$queryParams, &$formParams, &$headers)
    {
        $queryParams['access_token'] = $this->resolveAccessToken();
    }

    public function decodeResponse($response)
    {
        return json_decode($response);
    }

    public function resolveAccessToken()
    {
        return $this->secret;
    }
    public function handleSubscription(Request $request)
    {
        $subscription = $this->createSubscription(
            $request->plan,
            $request->user()->name,
            $request->user()->email
        );

        //se genera una colección, es decir un array.
        $subscriptionLinks = collect($subscription->links);

        $approve = $subscriptionLinks->where('rel', 'approve')->first();

        session()->put('subscriptionId', $subscription->id);

        return redirect($approve->href); 
    }

    public function createSubscription($planSlug, $name, $email)
    {
        return $this->makeRequest(
            'POST',
            '/v1/billing/subscriptions',
            [],
            [
                'plan_id' => $this->plans[$planSlug],
                'subscriber' => [
                    'name' => [
                        'given_name' => $name,
                    ],
                    'email_address' => $email,
                ],
                'application_context' => [
                    'brand_name' => config('app.name'),
                    'shipping_preference' => 'NO_SHIPPING',
                    'user_action' => 'SUBSCRIBE_NOW',
                    'return_url' => route('subscribe.approval', ['plan' => $planSlug]),
                    'cancel_url' => route('subscribe.cancelled'),
                ]
            ],
            [],
            $isJsonRequest = true,
        );
    }

    /**EXPLICACION DE IMPLEMENTACIÓN DE SEGURIDAD CON ESTE MÉTODO validateSubscription()
     * Si la sesión realmente tiene ese elemento SubscriptionId, pero no solo que si se encuentre, sino que coincida con la petición que recibimos de paypal
     * , entonces se obtiene la información de la sesion y vamos a borrar inmediatamente la información d esa sesión, independientemente de si a coincibido o no 
     * la sesión para que no pueda ser utilizada luego. Es decir, una vez que el usuario llegó al approval, se verifica la información de la sesión, se guarda en una variable
     * , lo borramos y de esa manera se verifica de que por muy minima posibilidad algún otro usuario haya recibido el id, que puede ser que por ejemplo, el mismo usuario fuera enviado
     * el id de la subscripción a otro usuario, e intente falsiar el sistema con otra subscripción, pues no va a poder porque sencillamente se elimina esa posibilidd.
     * Se va a retorna bien sea verdadero o falso.
     * Entonces este método solo va a retornar true, si existe el id de la subscripción en la sesión y que además coincide con el identificador de subscripción que 
     * retorna paypal.
     */
    public function validateSubscription(Request $request)
    {
        if (session()->has('subscriptionId')) {
            $subscriptionId = session()->get('subscriptionId');

            session()->forget('subscriptionId');

            return $request->subscription_id == $subscriptionId;
        }

        return false;
    }
}
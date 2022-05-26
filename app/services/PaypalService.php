<?php

namespace App\Services;

use App\Traits\ConsumesExternalServices;

//esta clase tenddrá la capacidad de realizar peticiones a través de trais definido
class PaypalService
{
    use ConsumesExternalServices;

    protected $baseUri;

    protected $clientId;

    protected $clientSecret;

    public function __construct()
    {
        $this->baseUri = config('services.paypal.base_uri');
        $this->clientId = config('services.paypal.client_id');
        $this->clientSecret = config('services.paypal.client_secret');
        //$this->plans = config('services.paypal.plans');
    }

    public function resolveAuthorization(&$queryParams, &$formParams, &$headers)
    {
        //con el método resolveAccessToken va a permitir añadir el token de autorización en la cabecera de la petición
        $headers['Authorization'] = $this->resolveAccessToken();
    }

    public function decodeResponse($response)
    {
        //con esto retorna en formato json, para poderlas usar como objetos de php
        return json_decode($response);
    }

    public function resolveAccessToken()
    {
        //la petición http solicita codificación en base 64 la autenticación
        $credentials = base64_encode("{$this->clientId}:{$this->clientSecret}");

        //el return indica que estamos usando una autenticación básica, entonces se retorna un string
        return "Basic {$credentials}";
    }
}
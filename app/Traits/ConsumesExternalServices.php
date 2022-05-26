<?php

namespace App\Traits;

use GuzzleHttp\Client;

trait ConsumesExternalServices
{
    //este va a tener la funcionalidad de enviar una petición
    public function makeRequest($method, $requestUrl, $queryParams = [], $formParams
    = [], $headers = [], $isJsonRequest = false)
    {

        $client = new Client([
            'base_uri' => $this->baseUri,
        ]);

         if (method_exists($this, 'resolveAuthorization')) {
             /* autenticación de permiso, es decir autorizar la petición, que normalmente las apis se autorizan a traves de las cabeceras
            y los parametros query, esto se pasa con un apuntador, es decir con una referencia*/
            $this->resolveAuthorization($queryParams, $formParams, $headers);
         }   
        

        //recibir parametros de la petición en formato json o recibirlo en el formato requerido
        $response = $client->request($method, $requestUrl, [
            $isJsonRequest ? 'json' : 'form_params' => $formParams,
            'headers' => $headers,
            'query' => $queryParams,
        ]);

        $response = $response->getBody()->getContents();
        
        if (method_exists($this, 'decodeResponse')) {
            //decodificacion de la respuesta o el servicio
            $response = $this->decodeResponse($response);
        }
        

        return $response;

    }
}

<?php

use GuzzleHttp\Client;

function getDataUsingGuzzle ($myCity) {

    $apiKey = '453a29cd4f2dd9dcd3c7dc07a477d04c';
    $client = new Client ([
        'base_uri' => "https://api.openweathermap.org/data/2.5/weather?q=".$myCity."&appid=".$apiKey
    ]);
    $response = $client->request('GET');
    $data = json_decode($response->getBody() , true);
    return $data;
}
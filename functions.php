<?php 

function getWeather ($myCity) { // using curl
    $apiKey = '453a29cd4f2dd9dcd3c7dc07a477d04c';
    $apiUrl = "https://api.openweathermap.org/data/2.5/weather?q=".$myCity."&appid=".$apiKey." ";
    $ch = curl_init(); // handler
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, -1);
    curl_setopt($ch, CURLOPT_URL, $apiUrl);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION , 1); 
    $response = curl_exec($ch);
    $data = json_decode($response, true); 
    if (var_dump($data) == NULL) {
        throw new Exception('API is down for the moment');
    }
    return $data;
}
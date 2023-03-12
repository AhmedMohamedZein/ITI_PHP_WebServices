<?php 
require_once('vendor/autoload.php');

if ( isset ( $_POST["cities"] ) ) {
    $myCity = $_POST["cities"];

    // $data = getDataUsingCurl($myCity); // Using CURL
    $data = getDataUsingGuzzle ($myCity); // Using Guzzle
    // using Associative Array
    $weatherStatus["weatherName"] = $data["name"];
    $weatherStatus["weatherDescription"] = $data["weather"][0]["description"];
    $weatherStatus["weather"] = $data["weather"][0]["main"];
    $weatherStatus["temp_min"] = $data["main"]["temp_min"];
    $weatherStatus["temp_max"] = $data["main"]["temp_max"];    
    $weatherStatus["humidity"] = $data["main"]["humidity"];
    $weatherStatus["wind"] = $data["wind"]["speed"];
}
else {
    $jsonFile = file_get_contents('eg.json');
    $cities = json_decode ( $jsonFile , true );
}

require_once('views/selectCity.php');
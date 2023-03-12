<?php 
require_once('functions.php');

if ( isset ( $_POST["cities"] ) ) {
    $myCity = $_POST["cities"];

    $data = getWeather($myCity);
    
    $weather_name = $data["name"];
    $weather_description = $data["weather"][0]["description"];
    $weather = $data["weather"][0]["main"];
    $temp_min = $data["main"]["temp_min"];
    $temp_max = $data["main"]["temp_max"];    
    $humidity = $data["main"]["humidity"];
    $wind = $data["wind"]["speed"];
}
else {
    $jsonFile = file_get_contents('eg.json');
    $cities = json_decode ( $jsonFile , true );
}

require_once('views/selectCity.php');
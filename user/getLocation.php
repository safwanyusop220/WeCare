<?php

include "../sql/config.php";

error_reporting(0);
$lat = $_POST['latitude']; 
$long = $_POST['longitude'];



function pegaLocal($lat,$long){
    echo ("<br>latitude: ".$lat);
    echo ("<br>longitude: ".$long);
    $address=file_get_contents("http://maps.googleapis.com/maps/api/geocode/json?latlng=$lat,$long&sensor=true");
    $json_data=json_decode($address);
    // $full_address=$json_data->results[0]->formatted_address;
    // echo "<br>".$full_address;
    if($full_address=$json_data->results[0]->formatted_address){
        return $full_address;
    }
    else{
        return "A requisição não obteve resposta do <b>http://maps.googleapis.com/maps/api/geocode/json?latlng=$lat,$long&sensor=true</b>";
    }
}

$x = pegaLocal($lat,$long);
echo "<br><br><br>".$x;
?>
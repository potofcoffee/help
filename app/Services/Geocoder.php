<?php


namespace App\Services;


class Geocoder
{

    public static function resolve($address, $zip, $city) {
        $url = 'https://nominatim.openstreetmap.org/search.php?q='.urlencode($address.', '.$zip.' '.$city).'&format=json&addressdetails=1';
        $opts = array('http'=>array('header'=>"User-Agent: wir-helfen-nachbarn.de Corona-time neighborhood help database \r\n"));
        $context = stream_context_create($opts);
        $result = json_decode(file_get_contents($url, false, $context), true);
        return $result[0];
    }

}

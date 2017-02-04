<?php
const GOOGLE_MAP_API = "https://maps.googleapis.com/maps/api/geocode/json?address=Nantes,France&key=AIzaSyAkIJ7rDp2F0J39TH8DRIvqtYHrJx-Zsi8";
const NANTES_TRAFFIC_API = "http://api.loire-atlantique.fr:80/opendata/1.0/traficevents?filter=Tous";


$proxySettings = array('http' => array('proxy' => 'www-cache:3128', "request_fulluri" => true));
$context = stream_context_create($proxySettings);

$json = file_get_contents(GOOGLE_MAP_API, true, $context ) or die('Unable to load Google Map API');
$data = json_decode($json, true);
$latitude =  $data['results'][0]['geometry']['location']['lat'];
$longitude = $data['results'][0]['geometry']['location']['lng'];

$events = file_get_contents(NANTES_TRAFFIC_API, true, $context) or die('Unable to load Nantes API');

include_once('app.php');
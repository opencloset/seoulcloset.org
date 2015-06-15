<?php
function ufofactory_geocode($address) {
  $content = file_get_contents("http://maps.googleapis.com/maps/api/geocode/json?address={$address}&sensor=false");
  $json = json_decode($content);
  return $json->results[0]->geometry->location;
}
?>
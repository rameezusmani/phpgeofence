<?php

include "../src/autoload.php";

use UglyGeoFence\GeoFence;
use UglyGeoFence\GeoFenceTool;

$geofences=array();
$geofences[]=new GeoFence("1",24.912746,67.030953,5,GeoFenceTool::UNIT_KILOMETER);
$geofences[]=new GeoFence("2",24.920142,67.031602,1,GeoFenceTool::UNIT_KILOMETER);
$geofences[]=new GeoFence("3",24.921255,67.055853,5,GeoFenceTool::UNIT_METER);

$tool=new GeoFenceTool($geofences);
$tool->addGeoFence(new GeoFence("4",24.912746,67.030953,1,GeoFenceTool::UNIT_KILOMETER));

//get all the geofences in which this set of coordinates lies
$foundGfs=$tool->getGeoFencesForCoordinates(array("latitude"=>24.920438,"longitude"=>67.054769));
print_r($foundGfs);
echo "<br />";
//get the distance of set of coordinates from a geofence
//distance returned will be in the units of this geo fence
$dst=$geofences[0]->distance(array("latitude"=>24.920438,"longitude"=>67.054769));
echo $dst."".$geofences[0]->radius_unit;
echo "<br />";

?>
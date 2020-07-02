<?php

$uglyGeoFenceClassMap=array();
$uglyGeoFenceClassMap["UglyGeoFence\\GeoFence"]="GeoFence.php";
$uglyGeoFenceClassMap["UglyGeoFence\\GeoFenceTool"]="GeoFenceTool.php";
$uglyGeoFenceClassMap["UglyGeoFence\\DistanceCalculator"]="DistanceCalculator.php";

spl_autoload_register(function($class_name) {
    global $uglyGeoFenceClassMap;
    if (isset($uglyGeoFenceClassMap[$class_name])){
        $class_filename=$uglyGeoFenceClassMap[$class_name];
        $include_path=dirname(__FILE__)."/".$class_filename;
        require_once($include_path);
    } 
});

?>
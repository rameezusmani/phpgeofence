<?php

namespace UglyGeoFence;

use UglyGeoFence\GeoFenceTool;

class DistanceCalculator {

    public static function calculate($lat1, $lon1, $lat2, $lon2, $unit) {
        if (($lat1 == $lat2) && ($lon1 == $lon2)) {
            return 0;
        }else {
            $theta = $lon1 - $lon2;
            $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
            $dist = acos($dist);
            $dist = rad2deg($dist);
            $miles = $dist * 60 * 1.1515; //convert degress to miles
            if ($unit==GeoFenceTool::UNIT_MILE){
                return $miles;
            }
            $kms=$miles * 1.609344; //miles to KMs
            if ($unit == GeoFenceTool::UNIT_KILOMETER) {
                return $kms;
            }else if ($unit == GeoFenceTool::UNIT_NAUTICAL_MILE) {
                return ($miles * 0.8684); //miles to Nautical miles
            }else if ($unit == GeoFenceTool::UNIT_METER) {
                return $kms*1000; //KM to meters
            }
            //invalid unit
            return FALSE;
        }
    }
}
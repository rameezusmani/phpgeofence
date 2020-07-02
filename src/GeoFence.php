<?php

namespace UglyGeoFence;

use UglyGeoFence\DistanceCalculator;
use UglyGeoFence\GeoFenceTool;

class GeoFence {

    public $id;
    public $latitude=0,$longitude=0;
    public $radius=5;
    public $radius_unit=GeoFenceTool::UNIT_METER;
    
    public function __construct($id,$latitude,$longitude,$radius,$unit=GeoFenceTool::UNIT_METER){
        $this->id=$id;
        $this->latitude=$latitude;
        $this->longitude=$longitude;
        $this->radius=$radius;
        $this->radius_unit=$unit;
    }

    public function isInside($coordinates){
        $dst=$this->distance($coordinates);
        if ($dst<=$this->radius){
            return $dst;
        }
        return FALSE;
    }

    public function distance($coordinates){
        $latitude=$coordinates["latitude"];
        $longitude=$coordinates["longitude"];
        $dst=DistanceCalculator::calculate($latitude,$longitude,$this->latitude,$this->longitude,$this->radius_unit);
        return $dst;
    }
}

?>
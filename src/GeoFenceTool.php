<?php

namespace UglyGeoFence;

class GeoFenceTool {
    const UNIT_METER='m';
    const UNIT_KILOMETER='km';
    const UNIT_MILE='mi';
    const UNIT_NAUTICAL_MILE='nmi';

    public $geoFences=array();
    public function __construct($gfs){
        $this->geoFences=$gfs;
    }

    public function addGeoFence($gf){
        $this->geoFences[]=$gf;
    }

    public function getGeoFencesForCoordinates($coordinates){
        $fences=array();
        foreach ($this->geoFences as $gf){
            $dst=$gf->isInside($coordinates);
            if ($dst!==FALSE){
                $fences[]=array("distance"=>$dst,"geofence"=>$gf);
                $fences[]=$gf;
            }
        }
        return $fences;
    }
}

?>
<?php
/**
 * Created by PhpStorm.
 * User: Tomeu
 * Date: 11/8/2015
 * Time: 11:45 PM
 */

namespace hotelbeds\hotel_api_sdk\model;

class Geolocation extends ApiModel
{
    CONST KM='m';
    CONST M='m';

    public function __construct()
    {
        $this->validFields = [
            "longitude" => "float",
            "latitude" => "float",
            "radius" => "float",
            "secondaryLatitude" => "float",
            "secondaryLongitude" => "float"
        ];
    }
}
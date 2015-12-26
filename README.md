# hotel-api-sdk-php

## Introduction 
Hotelbeds SDK for PHP is a set of utilities whose main goal is to help in the development of PHP applications that use APItude, the Hotelbeds API.
This is a composer library available on packagist.org repository.
Manly use Zend library components.

## License
This softwared is licensed under the LGPL v2.1 license. Please refer to the file LICENSE for specific details and more license and copyright information.

## Install
Install from console or PHPStorm Composer Utility:

composer require hotelbeds/hotel-api-sdk-php

## Using SDK

### Include library using autoload PSR-0

<?php
require __DIR__ .'/vendor/autoload.php';

$reader = new Zend\Config\Reader\Ini();
$config   = $reader->fromFile(__DIR__.'/HotelApiClient.ini');
$cfgApi = $config["apiclient"];
        
$apiClient = new HotelApiClient($cfgApi["url"],
                                $cfgApi["apikey"],
                                $cfgApi["sharedsecret"],
                                new ApiVersion(ApiVersions::V1_0),
                                $cfgApi["timeout"]);

$rqData = new \hotelbeds\hotel_api_sdk\helpers\Availability();
$rqData->stay = new Stay(DateTime::createFromFormat("Y-m-d", "2016-02-01"),
                         DateTime::createFromFormat("Y-m-d", "2016-02-10"));

$rqData->destination = new Destination("PMI");
$occupancy = new Occupancy();
$occupancy->adults = 2;
$occupancy->children = 1;
$occupancy->rooms = 1;

$occupancy->paxes = [ new Pax(Pax::AD, 30, "Mike", "Doe"), new Pax(Pax::AD, 27, "Jane", "Doe"), new Pax(Pax::CH, 8, "Mack", "Doe") ];
$rqData->occupancies = [ $occupancy ];

$availRS = $apiClient->availability($rqData);

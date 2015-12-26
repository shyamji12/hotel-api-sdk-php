# hotel-api-sdk-php

## Introduction 
Hotelbeds SDK for PHP is a set of utilities whose main goal is to help in the development of PHP applications that use APItude, the Hotelbeds API.
This is a composer library available on packagist.org repository.
Manly use Zend library components.

## License
This softwared is licensed under the LGPL v2.1 license. Please refer to the file LICENSE for specific details and more license and copyright information.

## Install
Install from console or PHPStorm Composer Utility:

```bash
composer require hotelbeds/hotel-api-sdk-php
```
## Testing

In the directory unit tests can find different tests that can be run with phpunit. There are different sets of tests: Availability and bookings.

```bash
.\vendor\bin\phpunit --testsuite availability
```

This testsuite execute: status of API, make availability on PMI destination, select one room and do checkrate and booking.

## Using SDK

### Include library using autoload PSR-0

```php
<?php
require __DIR__ .'/vendor/autoload.php';

use hotelbeds\hotel_api_sdk\HotelApiClient;
use hotelbeds\hotel_api_sdk\model\Destination;
use hotelbeds\hotel_api_sdk\model\Occupancy;
use hotelbeds\hotel_api_sdk\model\Pax;
use hotelbeds\hotel_api_sdk\model\Rate;
use hotelbeds\hotel_api_sdk\model\Stay;
use hotelbeds\hotel_api_sdk\types\ApiVersion;
use hotelbeds\hotel_api_sdk\types\ApiVersions;
use hotelbeds\hotel_api_sdk\messages\AvailabilityRS;

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
```

### Iterate availability results

After availabity method call can iterate results with iterator or can read with array form. 

```php

// Iterate all returned hotels with an Hotel object
foreach ($availRS->hotels->iterator() as $hotelCode => $hotelData)
{
        // Get all hotel data (from Hotel object $hotelData)
        
        // Iterate all rooms of each hotel
        foreach ($hotelData->iterator() as $roomCode => $roomData)
        {
                // Iterate all rate of each room
                foreach($roomData->rateIterator() as $rateKey => $rateData)
                {
                        
                }
        }
}

```


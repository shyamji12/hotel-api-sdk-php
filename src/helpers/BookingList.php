<?php
/**
 * Created by PhpStorm.
 * User: Tomeu
 * Date: 11/17/2015
 * Time: 7:22 PM
 */

namespace hotelbeds\hotel_api_sdk\helpers;

/**
 * Class BookingList
 * @package hotelbeds\hotel_api_sdk\helpers
 * @property \DateTime $start Date from when the method will start checking bookings
 * @property \DateTime $end Date to when the method will finish checking bookings.
 * @property integer $from Number "from" of bookings to be returned
 * @property integer $to Number "to" of bookings to be returned
 * @property boolean $includeCancelled The parameter is used to get all bookings including cancelled bookings or excluding cancelled bookings
 * @property string $filterType The parameter is used to identify if the bookings list is by check-in date or by booking creation date.
 */
class BookingList extends ApiHelper
{
    public function __construct()
    {
        $this->validFields = [
            "start" => "DateTime",
            "end" => "DateTime",
            "from" => "integer",
            "to" => "integer",
            "includeCancelled" => "boolean",
            "filterType" => "string"
        ];
    }
}
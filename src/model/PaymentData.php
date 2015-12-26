<?php
/**
 * Created by PhpStorm.
 * User: Tomeu
 * Date: 11/29/2015
 * Time: 10:51 PM
 */

namespace hotelbeds\hotel_api_sdk\model;

/**
 * Class PaymentData
 * @package hotelbeds\hotel_api_sdk\model
 */
class PaymentData extends ApiModel
{
    public function __construct()
    {
        $this->validFields = [
            "paymentCard" => "array",
            "contactData" => "array"
        ];
    }
}
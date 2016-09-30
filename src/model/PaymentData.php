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
 * 
 * @property array paymentCard Payment Card info
 * @property array contactData ContractData
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
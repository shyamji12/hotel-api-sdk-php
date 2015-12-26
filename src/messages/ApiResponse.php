<?php
/**
 * Created by PhpStorm.
 * User: Tomeu
 * Date: 10/27/2015
 * Time: 3:12 AM
 */

namespace hotelbeds\hotel_api_sdk\messages;

class FieldNotExists extends \Exception{}

abstract class ApiResponse
{
    private $responseData;

    public function __construct(array $rsData)
    {
        $this->responseData = $rsData;
    }

    public function __get($field)
    {
        if (!array_key_exists($field, $this->responseData))
            throw new FieldNotExists("$field not exists in this data response");

        return $this->responseData[$field];
    }

    public function __set($field, $value)
    {
        $this->responseData[$field] = $value;
    }

    public function toArray()
    {
        return $this->responseData;
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: Tomeu
 * Date: 11/5/2015
 * Time: 12:20 AM
 */

namespace hotelbeds\hotel_api_sdk\model;

/**
 * Class Pax
 * @package hotelbeds\hotel_api_sdk\model
 * @property integer roomId
 * @property string type Pax type. Two values are permitted for the attribute: AD for adult y CH
 * @property integer age
 * @property string name
 * @property string surname
 */
class Pax extends ApiModel
{
    const AD = 'AD';
    const CH = 'CH';

    public function __construct($type=self::AD, $age=30, $name=null, $surname=null, $roomId=null)
    {
        $this->validFields =
            ["roomId" => "integer",
             "type" => "string",
             "age" => "integer",
             "name" => "string",
             "surname" => "string"];

        $this->age = $age;
        $this->type = $type;
        if ($roomId !== null)
            $this->roomId = $roomId;

        if ($name !== null)
            $this->name = $name;

        if ($surname !== null)
            $this->surname = $surname;

    }
}
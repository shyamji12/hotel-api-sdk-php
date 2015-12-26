<?php
/**
 * Created by PhpStorm.
 * User: Tomeu
 * Date: 11/7/2015
 * Time: 1:50 PM
 */

namespace hotelbeds\hotel_api_sdk\generic;

class FieldNotValid extends \Exception{}

abstract class DataContainer
{
    protected $validFields = [];
    protected $fields = [];

    public function __set($field, $value)
    {
        if (!empty($this->validFields) && !array_key_exists($field, $this->validFields))
            throw new FieldNotValid("$field not valid for this model");

        $type = $this->validFields[$field];

        if (empty($type))
            $this->fields[$field] = $value;

        if (is_object($value)) {
            if (get_class($value) !== $type)
                throw new \Exception("Type error: Field $field needs $type class type: ".get_class($value));

            if (!is_a($value, $type))
                throw new \Exception("Type error: Field $field needs $type class type!");
        } else if (gettype($value) !== $type)
            throw new \Exception("Type error: Field $field needs $type type!");

        $this->fields[$field] = $value;
    }

    public function __get($field)
    {
        if (!empty($this->validFields) && !array_key_exists($field, $this->validFields))
            throw new FieldNotValid("$field not valid for this model");

        return $this->fields[$field];
    }

    /**
     * Transform data fields into PHP-array structure
     *
     * @return array Data fields array structure
     */

    public function toArray()
    {
        return array_map(function($item) {
            if (is_object($item) && get_class($item) === "DateTime") {
                return $item->format("Y-m-d");
            } else {
                if ($item instanceof DataContainer) {
                    return $item->toArray();
                }
            }

            if (is_array($item))
            {
                return array_map(function($subItem) {
                    if ($subItem instanceof DataContainer) {
                        return $subItem->toArray();
                    }
                    return $subItem;
                }, $item);
            }

            if (is_bool($item)) return $item ? "Y" : "N";

            return $item;
        }, $this->fields);
    }

}
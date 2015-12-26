<?php
/**
 * Created by PhpStorm.
 * User: Tomeu
 * Date: 11/14/2015
 * Time: 11:25 PM
 */

namespace hotelbeds\hotel_api_sdk\model;

class PromotionsIterator implements \Iterator
{
    private $promotions, $position = 0;
    public function __construct(array $promotions)
    {
        $this->promotions = $promotions;
    }

    public function current()
    {
        return new Promotion($this->promotions[$this->position]);
    }

    public function next()
    {
        ++$this->position;
    }

    public function key()
    {
        return $this->promotions[$this->position]["code"];
    }

    public function valid()
    {
        return ( $this->position < count($this->promotions) );
    }

    public function rewind()
    {
        $this->position = 0;
    }
}
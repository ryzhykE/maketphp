<?php
/**
 * Created by PhpStorm.
 * User: Evgeniy
 * Date: 25.10.2016
 * Time: 18:17
 */

namespace App;


trait TMagic
{
    protected $data = [];

    public function __set($key, $value)
    {
        $this->data[$key] = $value;
    }

    public function __isset($key)
    {
        return isset($this->data['name']);
    }

    public function __get($key)
    {
        return $this->data[$key];
    }
}
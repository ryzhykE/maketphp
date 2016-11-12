<?php
/**
 * Created by PhpStorm.
 * User: Evgeniy
 * Date: 25.10.2016
 * Time: 18:17
 */

namespace App;


trait TSingleton
{
    protected static $instance = null;

    protected function __construct()
    {
    }
    protected function __clone()
    {
    }

    public static function getInstance()
    {
        if (null === static::$instance) {
            static::$instance = new static;
        }
        return static::$instance;
    }
}
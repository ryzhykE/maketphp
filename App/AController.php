<?php

namespace App;


use App\Exceptions\AuthException;
use App\Model\User;

abstract class AController
{
    protected $view;

    public function __construct()
    {
        $this->view = new View();
    }

}
<?php

namespace App;


abstract class AController
{
    protected $view;

    public function __construct()
    {
        $this->view = new View();
    }

    public function action($action)
    {
        $actMethodName = 'action' . $action;
        if ($this->access() === false) {
            echo 'Доступ закрыт';
            die;
        }
        return $this->$actMethodName();
    }

    protected function access()
    {

    }
}
<?php

namespace Controller;

class Controller
{
    public $controllerName;
    public $controllerMethod;

    public function getControllerAttributes()
    {
        return [
            "ControllerName" => $this->controllerName,
            "Method" => $this->controllerMethod
        ];
    }
}

<?php

namespace Motor;

abstract class Motorcycle
{
    use ManufacturerTrait;

    protected $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    abstract public function getInfo();
}

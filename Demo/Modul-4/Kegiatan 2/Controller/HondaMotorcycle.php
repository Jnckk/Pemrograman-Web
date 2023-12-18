<?php

namespace Controller;

use Motor\Motorcycle;

class HondaMotorcycle extends Motorcycle
{
    public function getInfo()
    {
        return [
            'manufacturer' => $this->getManufacturer(),
            'model' => $this->model,
        ];
    }
}

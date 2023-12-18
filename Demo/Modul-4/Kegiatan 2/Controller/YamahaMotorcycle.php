<?php

namespace Controller;

use Motor\Motorcycle;

class YamahaMotorcycle extends Motorcycle
{
    public function getInfo()
    {
        return [
            'manufacturer' => $this->getManufacturer(),
            'model' => $this->model,
        ];
    }
}

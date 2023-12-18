<?php

namespace Motor;

trait ManufacturerTrait
{
    protected $manufacturer;

    public function setManufacturer($manufacturer)
    {
        $this->manufacturer = $manufacturer;
    }

    public function getManufacturer()
    {
        return $this->manufacturer;
    }
}

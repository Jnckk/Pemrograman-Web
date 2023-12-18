<?php

namespace Motor;

class MotorProducts
{
    public static function getHondaProducts()
    {
        return [
            new \Controller\HondaMotorcycle('CBR1000RR-R Fireblade', 'Honda'),
            new \Controller\HondaMotorcycle('CRF450L', 'Honda'),
            new \Controller\HondaMotorcycle('Gold Wing', 'Honda'),
            new \Controller\HondaMotorcycle('CB1000R', 'Honda'),
            new \Controller\HondaMotorcycle('Africa Twin', 'Honda'),
            new \Controller\HondaMotorcycle('CB650R', 'Honda'),
            new \Controller\HondaMotorcycle('Rebel 500', 'Honda'),
            new \Controller\HondaMotorcycle('PCX150', 'Honda'),
            new \Controller\HondaMotorcycle('CRF250L', 'Honda'),
            new \Controller\HondaMotorcycle('Super Cub C125', 'Honda'),
        ];
    }

    public static function getYamahaProducts()
    {
        return [
            new \Controller\YamahaMotorcycle('YZF-R1', 'Yamaha'),
            new \Controller\YamahaMotorcycle('MT-09', 'Yamaha'),
            new \Controller\YamahaMotorcycle('FZ6R', 'Yamaha'),
            new \Controller\YamahaMotorcycle('Tracer 900 GT', 'Yamaha'),
            new \Controller\YamahaMotorcycle('YZF-R6', 'Yamaha'),
            new \Controller\YamahaMotorcycle('XSR900', 'Yamaha'),
            new \Controller\YamahaMotorcycle('Tenere 700', 'Yamaha'),
            new \Controller\YamahaMotorcycle('NMAX', 'Yamaha'),
            new \Controller\YamahaMotorcycle('MT-03', 'Yamaha'),
            new \Controller\YamahaMotorcycle('XMAX 300', 'Yamaha'),
        ];
    }
}

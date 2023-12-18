<?php

require_once 'Traits/ManufacturerTrait.php';
require_once 'Controller/Motorcycle.php';
require_once 'controller/HondaMotorcycle.php';
require_once 'controller/YamahaMotorcycle.php';
require_once 'Product/MotorProducts.php';

use Motor\MotorProducts;

$hondaProducts = MotorProducts::getHondaProducts();
$yamahaProducts = MotorProducts::getYamahaProducts();

$output = [
    'honda' => [
        [
            'manufacturer' => 'Honda',
            'model' => array_map(function ($product) {
                return $product->getInfo()['model'];
            }, $hondaProducts),
        ],
    ],
    'yamaha' => [
        [
            'manufacturer' => 'Yamaha',
            'model' => array_map(function ($product) {
                return $product->getInfo()['model'];
            }, $yamahaProducts),
        ],
    ],
];

echo json_encode($output, JSON_PRETTY_PRINT);

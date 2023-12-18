<?php
header("Content-Type: application/json; charset=UTF-8");

include "../app/Routes/MotorRoutes.php";

use app\Routes\MotorRoutes;
use MotorRoutes as GlobalMotorRoutes;

$method = $_SERVER['REQUEST_METHOD'];
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$motorRoute = new GlobalMotorRoutes;
$motorRoute->handle($method, $path);


// RUN WITH (php -S localhost:8000 index.php)
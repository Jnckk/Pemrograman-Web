<?php

include "../app/Controller/MotorController.php";

use MotorController as GlobalMotorController;

class MotorRoutes
{
    public function handle($method, $path)
    {
        $motorController = new GlobalMotorController;

        if ($method == 'GET' && $path == '/api/motor') {
            echo $motorController->index();
        }

        if ($method == 'GET' && strpos($path, '/api/motor/') === 0) {
            $pathParts = explode('/', $path);
            $id = $pathParts[count($pathParts) - 1];
            echo $motorController->getById($id);
        }

        if ($method == 'POST' && $path == '/api/motor') {
            echo $motorController->insert();
        }

        if ($method == 'PUT' && strpos($path, '/api/motor/') === 0) {
            $pathParts = explode('/', $path);
            $id = $pathParts[count($pathParts) - 1];
            echo $motorController->update($id);
        }

        if ($method == 'DELETE' && strpos($path, '/api/motor/') === 0) {
            $pathParts = explode('/', $path);
            $id = $pathParts[count($pathParts) - 1];
            echo $motorController->delete($id);
        }
    }
}

<?php

include "../app/Traits/ApiResponseFormatter.php";
include "../app/Models/Motor.php";

use app\Models\Motor;
use app\Traits\ApiResponseFormatter;
use Motor as GlobalMotor;

class MotorController
{
    use ApiResponseFormatter;

    public function index()
    {
        $motorModel = new GlobalMotor;
        $motors = $motorModel->findAll();

        // Organize data by brand
        $organizedData = [];
        foreach ($motors as $motor) {
            $brandName = $motor['brand_name'];
            unset($motor['brand_name']); // Remove redundant brand_name field

            $organizedData[$brandName][] = $motor;
        }

        // Format the response
        $response = [];
        foreach ($organizedData as $brandName => $motorList) {
            $response[] = [
                'brand_name' => $brandName,
                'data' => $motorList,
            ];
        }

        return $this->apiResponse(200, "success", $response);
    }

    public function getById($id)
    {
        // Create an instance of the Motor model
        $motorModel = new GlobalMotor;

        // Call the findById method to get a motor by ID
        $response = $motorModel->findById($id);

        // Return the formatted response using the ApiResponseFormatter trait
        return $this->apiResponse(200, "success", $response);
    }

    public function insert()
    {
        $jsonInput = file_get_contents('php://input');
        $inputData = json_decode($jsonInput, true);

        if (json_last_error()) {
            return $this->apiResponse(400, "error invalid input", null);
        }

        $motorModel = new GlobalMotor;
        $response = $motorModel->create($inputData);
        return $this->apiResponse(200, "success", $response);
    }

    public function update($id)
    {
        $jsonInput = file_get_contents('php://input');
        $inputData = json_decode($jsonInput, true);

        if (json_last_error()) {
            return $this->apiResponse(400, "error invalid input", null);
        }

        $motorModel = new GlobalMotor;
        $response = $motorModel->update($inputData, $id);
        return $this->apiResponse(200, "success", $response);
    }

    public function delete($id)
    {
        $motorModel = new GlobalMotor;
        $response = $motorModel->destroy($id);
        return $this->apiResponse(200, "success", $response);
    }
    // Helper method to transform data
    private function transformData($data)
    {
        $transformedData = [];

        // Group data by brand_name
        $groupedData = [];
        foreach ($data as $item) {
            $groupedData[$item['brand_name']][] = [
                'id' => $item['id'],
                'model' => $item['model'],
                'year' => $item['year'],
                'brand_id' => $item['brand_id']
            ];
        }

        // Format data as per the desired output
        foreach ($groupedData as $brandName => $brandItems) {
            $transformedData[] = [
                'brand_name' => $brandName,
                'data' => $brandItems
            ];
        }

        return $transformedData;
    }
}

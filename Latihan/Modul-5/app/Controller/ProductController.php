<?php

namespace app\Controller;

include "../app/Traits/ApiResponseFormatter.php";
include "../app/Models/Product.php";

use app\Models\Product;
use app\Traits\ApiResponseFormatter;

class ProductController
{
    use ApiResponseFormatter; // Use the ApiResponseFormatter trait

    public function index()
    {
        // Create an instance of the Product model
        $productModel = new Product();

        // Call the findAll method to get all products
        $response = $productModel->findAll();

        // Return the formatted response using the ApiResponseFormatter trait
        return $this->apiResponse(200, "success", $response);
    }

    public function getById($id)
    {
        // Create an instance of the Product model
        $productModel = new Product();

        // Call the findById method to get a product by ID
        $response = $productModel->findById($id);

        // Return the formatted response using the ApiResponseFormatter trait
        return $this->apiResponse(200, "success", $response);
    }

    public function insert()
    {
        // Capture JSON input
        $jsonInput = file_get_contents('php://input');
        $inputData = json_decode($jsonInput, true);

        // Validate whether the input is valid JSON
        if (json_last_error()) {
            return $this->apiResponse(400, "error invalid input", null);
        }

        // Create an instance of the Product model
        $productModel = new Product();

        // Call the create method to insert a new product
        $response = $productModel->create(["product_name" => $inputData['product_name']]);

        // Return the formatted response using the ApiResponseFormatter trait
        return $this->apiResponse(200, "success", $response);
    }

    public function update($id)
    {
        // TANGKAP INPUT JSON
        $jsonInput = file_get_contents('php://input');
        $inputData = json_decode($jsonInput, true);

        // VALIDASI APAKAH INPUT VALID
        if (json_last_error()) {
            return $this->apiResponse(400, "error invalid input", null);
        }

        // LANJUT JIKA TIDAK ADA ERROR
        $productModel = new Product();
        $response = $productModel->update(["product_name" => $inputData['product_name']], $id);

        return $this->apiResponse(200, "success", $response);
    }

    public function delete($id)
    {
        $productModel = new Product();
        $response = $productModel->destroy($id);

        return $this->apiResponse(200, "success", $response);
    }
}

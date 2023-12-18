<?php

include "../app/Config/DatabaseConfig.php";

use app\Config\DatabaseConfig;

class Motor extends DatabaseConfig
{
    public $conn;

    public function __construct()
    {
        // CONNECT KE DATABASE MYSQL
        $this->conn = new mysqli($this->host, $this->user, $this->password, $this->database_name, $this->port);

        // Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function findAll()
    {
        $sql = "SELECT motors.*, brands.name AS brand_name FROM motors 
                LEFT JOIN brands ON motors.brand_id = brands.id";
        $result = $this->conn->query($sql);
        $this->conn->close();

        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        return $data;
    }

    public function findById($id)
    {
        $sql = "SELECT motors.*, brands.name AS brand_name FROM motors 
                LEFT JOIN brands ON motors.brand_id = brands.id
                WHERE motors.id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $this->conn->close();

        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        return $data;
    }

    // PROSES INSERT DATA
    public function create($data)
    {
        $model = $data["model"];
        $year = $data["year"];
        $brand_id = $data["brand_id"];

        // Check if the ID is specified (ID 16 in this case)
        $id = isset($data["id"]) ? $data["id"] : null;

        // Use the specified ID in the query if provided
        $query = $id !== null
            ? "INSERT INTO motors (id, model, year, brand_id) VALUES (?, ?, ?, ?)"
            : "INSERT INTO motors (model, year, brand_id) VALUES (?, ?, ?)";

        $stmt = $this->conn->prepare($query);

        if ($id !== null) {
            // Bind parameters with ID
            $stmt->bind_param("issi", $id, $model, $year, $brand_id);
        } else {
            // Bind parameters without ID
            $stmt->bind_param("ssi", $model, $year, $brand_id);
        }

        $stmt->execute();
        $this->conn->close();
    }

    public function update($data, $id)
    {
        $model = $data["model"];
        $year = $data["year"];
        $brand_id = $data["brand_id"];

        $query = "UPDATE motors SET model = ?, year = ?, brand_id = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("siii", $model, $year, $brand_id, $id);
        $stmt->execute();
        $this->conn->close();
    }

    public function destroy($id)
    {
        $query = "DELETE FROM motors WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $this->conn->close();
    }
}

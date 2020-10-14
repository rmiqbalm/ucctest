<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    
    include_once '../config/database.php';
    include_once '../class/vehicles.php';

    $database = new Database();
    $db = $database->getConnection();

    $vehicle = new Vehicle($db);
    
    $vehicles = $vehicle->getVehicles();
    $vehiclesCount = $vehicles->rowCount();

    if($vehiclesCount > 0)
    {
        $vehicleArr = array();
        $vehicleArr["data"] = array();
        $vehicleArr["vehiclesCount"] = $vehiclesCount;

        while ($row = $vehicles->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $e = array(
                "id" => $id,
                "unique_id" => $unique_id,
                "name" => $name,
                "engine_displacement" => $engine_displacement,
                "engine_power" => $engine_power,
                "price" => $price,
                "location" => $location,
                "datecreated" => $datecreated
            );

            array_push($vehicleArr["data"], $e);
        }
        $vehicleArr["status"] = 'OK';
        echo json_encode($vehicleArr);
    }
    else
    {
        http_response_code(404);
        echo json_encode(
            array(
                "status" => "Error",
                "message" => "No record found."
            )
        );
    }
?>
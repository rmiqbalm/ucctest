<?php
    // Set HEader
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
    // Load Required Files
    include_once '../config/database.php';
    include_once '../class/vehicles.php';
    
    // Set Database Connection
    $database = new Database();
    $db = $database->getConnection();

    // Set New Vehicle Class
    $vehicle = new Vehicle($db);
    
    // Set data variable from post values
    $data = json_decode(file_get_contents("php://input"));
    
    // Set variable error message for empty values
    $empty_msg = '';
    // Validation empty values
    if( isset($data->unique_id) && empty($data->unique_id) ){
        $empty_msg .= 'Unique ID is required<br />';
    }
    if( isset($data->name) && empty($data->name) ){
        $empty_msg .= 'Name is required<br />';
    }
    if( isset($data->engine_displacement) && empty($data->engine_displacement) ){
        $empty_msg .= 'Engine Displacemenet is required<br />';
    }
    if( isset($data->engine_power) && empty($data->engine_power) ){
        $empty_msg .= 'Engine Power is required<br />';
    }
    if( isset($data->price) && empty($data->price) ){
        $empty_msg .= 'Price is required<br />';
    }
    if( isset($data->location) && empty($data->location) ){
        $empty_msg .= 'Location is required<br />';
    }
    // Return if has empty error message
    if( !empty($empty_msg) ){
        echo json_encode(
            array(
                "status" => "Error",
                "message" => $empty_msg
            )
        );
    }
    
    // Sanitize
    $data->unique_id = $vehicle->checkInput($data->unique_id);
    $data->name = $vehicle->checkInput($data->name);
    $data->engine_displacement = $vehicle->checkInput($data->engine_displacement);
    $data->engine_power = $vehicle->checkInput($data->engine_power);
    $data->price = $vehicle->checkInput($data->price);
    $data->location = $vehicle->checkInput($data->location);
    
    // Set data post to class
    $vehicle->unique_id = $data->unique_id;
    $vehicle->name = $data->name;
    $vehicle->engine_displacement = $data->engine_displacement;
    $vehicle->engine_power = $data->engine_power;
    $vehicle->price = $data->price;
    $vehicle->location = $data->location;
    
    if($vehicle->createVehicle()){
        echo json_encode(
            array(
                "status" => "OK",
                "message" => "Vehicle created successfully."
            )
        );
    } else{
        echo json_encode(
            array(
                "status" => "Error",
                "message" => "Vehicle could not be created."
            )
        );
    }
?>
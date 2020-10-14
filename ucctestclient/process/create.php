<?php
    // Load Default Config
    require_once "../config/config.php";
    // Set Flash Message
    // Load Flash Message Library
    require '../library/FlashMessages.php';
    // A session is required
    if (!session_id()) @session_start();
    // Instantiate the class
    $msg = new \Plasticbrain\FlashMessages\FlashMessages();

    // API URL Loaded by Config
    // API Request name
    $request_name = 'create';
    // Full API URL
    $request_url = $api_url . $request_name . '.php';
    // Set Post Data
    $data = $_POST;
    
    // Initializes a new cURL session
    $curl = curl_init($request_url);
    // Set the CURLOPT_RETURNTRANSFER option to true
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    // Set the CURLOPT_POST option to true for POST request
    curl_setopt($curl, CURLOPT_POST, true);
    // Set the request data as JSON using json_encode function
    curl_setopt($curl, CURLOPT_POSTFIELDS,  json_encode($data));
    // Set custom headers for RapidAPI Auth and Content-Type header
    curl_setopt($curl, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json'
    ]);
    // Execute cURL request with all previous settings
    $response = curl_exec($curl);
    // Close cURL session
    curl_close($curl);
    
    // Decode JSON Response
    $response = json_decode($response);
    
    // Check Response
    if( $response->status == "OK" ){
        $msg->success('This is a success message');
    }else{
        $msg->error('This is an error message');
    }
    
    // Set redirect URL (BASE URL loaded by config)
    header("Location: ".$base_url);
    die();
?>
<?php
    // Set Flash Message
    // Load Flash Message Library
    require 'library/FlashMessages.php';
    // A session is required
    if (!session_id()) @session_start();
    // Instantiate the class
    $msg = new \Plasticbrain\FlashMessages\FlashMessages();
    
    // API URL Loaded by Config
    // API Request name
    $request_name = 'read';
    // Full API URL
    $request_url = $api_url . $request_name . '.php';
    
    // Initializes a new cURL session
    $curl = curl_init($request_url);
    // Set the CURLOPT_RETURNTRANSFER option to true
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
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
    // Set Vehicle Data
    $vehicles_data = array();
    if( $response->status == 'OK' ){
        $vehicles_data = $response->data;
    }
    
    /**
     * Returns number format
     * @author  Iqbal
     */
    function ucc_number($number, $decimals = 2, $dec_point = "," , $thousands_sep = ".") {
        return number_format($number, $decimals, $dec_point, $thousands_sep);
    }
    
    /**
     * Convert Liter to Cubic Centimeter value
     * Returns CC value
     * @author  Iqbal
     */
    function liter_cc($value){
        $cc_val = 1000;
        return $value * $cc_val;
    }
    
    /**
     * Convert Liter to Cubic Inch value
     * Returns CI value
     * @author  Iqbal
     */
    function liter_ci($value){
        $ci_val = 61.0237;
        return $value * $cc_val;
    }
    
    /**
     * Convert Cubic Inch to Liter value
     * Returns Liter value
     * @author  Iqbal
     */
    function cc_liter($value){
        $cc_val = 1000;
        return $value / $cc_val;
    }
?>
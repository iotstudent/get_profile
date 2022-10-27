<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Mehtods:GET');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,application/json,Access-Control-Allow-Methods,Content-Type,Authorization,X-Requested-with');


$backend = True;
$age = 25; 
 
    // if decode succeed, show rider details
    try {
 
  
             // set response code
             http_response_code(200);
        
             echo json_encode(
                     array(
                         "slackUsername" => "IOTStudent",
                         "backend" => $backend,
                         "age" => $age,
                         "bio" => " Backend engineer in training, interested in embedded systems and IOT"
                        
                     )
                 );
      
    }catch (Exception $e){
 
        // set response code
        http_response_code(401);
     
        // show error message
        echo json_encode(array(
            "error" => $e->getMessage()
        ));
    }
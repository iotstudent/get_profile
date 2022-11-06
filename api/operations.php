<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Mehtods:POST');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,application/json,Access-Control-Allow-Methods,Content-Type,Authorization,X-Requested-with');



//get posted data
$data = json_decode(file_get_contents("php://input"));
$operation_type = $data->operation_type;
$x = $data->x;
$y = $data->y;
if($operation_type && $x && $y){

    switch ($operation_type) {
        case "addition":
           $result = $x + $y;
          break;
        case "subtraction":
          $result = $x - $y;
          break;
        case "multiplication":
          $result = $x * $y;
          break;
        default:
          $result = "wrong operation";
      }

       // set response code
       http_response_code(200);
        
       echo json_encode(
               array(
                   "slackUsername" => "IOTStudent",
                   "result" => $result,
                   "operation_type" => $operation_type
               )
           );
    
}else{
     
    // set response code
    http_response_code(400);
 
    // display message: unable to create user
    echo json_encode(array("message" => "In complete input"));
}



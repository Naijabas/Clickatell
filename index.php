<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
  
// get posted data
$post_data = json_decode(file_get_contents("php://input"));
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
// make sure data is not empty
if(
    !empty($post_data->phone_number) &&
    !empty($post_data->message)
){
  
    
    $data = new stdClass();
    $data->content = $post_data->message;
    $data->to = [$post_data->phone_number];
    $data->binary = false;
    $data->clientMessageId = generateRandomString();
    $data->channel = "sms";
    
    
    require "curl.php";
    // print_r($response);
    
    
    
  
    // create the product
    if($response){
  
        // set response code - 201 created
        http_response_code(201);
  
        // tell the user
        echo $response;
    }
  
    // if unable to create the product, tell the user
    else{
  
        // set response code - 503 service unavailable
        http_response_code(503);
  
        // tell the user
        echo json_encode(array("message" => "Unable to send sms."));
    }
}
  
// tell the user data is incomplete
else{
  
    // set response code - 400 bad request
    http_response_code(400);
  
    // tell the user
    echo json_encode(array("message" => "Unable to send sms."));
}


}else{
    http_response_code(400);
  
    // tell the user
    echo json_encode(array("message" => "Unsupported method ". $_SERVER['REQUEST_METHOD']));
}


function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
?>
<?php
require('vendor/autoload.php');


// here we will make the routes like an entery point euch request will pass through here 

$requestURL = $_SERVER["REQUEST_URI"];
$method = $_SERVER["REQUEST_METHOD"];
$parseURL = explode('/' , $requestURL); 
$errors = NULL;
$result = NULL ;
// the third item $parseURL --> { empty , ? , index.php } will be the root
// any request will be in the form of localhost/webServices/index.php/resourses/resoursesID


if ( isset ($parseURL[4]) ) {
    
    switch($parseURL[4]) {
        
        case 'products' : 
            try {
                $result = productsRoute($method , $parseURL);   
            }
            catch (Exception $exception) {
                $errors["error"] = $exception->getMessage();
            }
            break ;
        
         // add new end-points here 
            
        default : 
            $errors["error"] = 'You are not authorized to access this resource';
            http_response_code(404);
            break;
    }

}

if ( isset($result) ){
    header('Content-Type:application/json');
    echo json_encode($result , JSON_FORCE_OBJECT);
}
else {
    header('Content-Type:application/json');
    echo json_encode($errors);
}

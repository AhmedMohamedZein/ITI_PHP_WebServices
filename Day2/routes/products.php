<?php

// ----   /products { here we will handle the request for this end point }

function productsRoute ($method , $parseURL) {
    $result = NULL ;
    switch($method) {
        case 'GET' :
            try {
                if ( !empty( $parseURL[5] ) ) {
                    $result = getSpecificProduct($parseURL[5]);
                }else {
                    $result = getAllProducts();
                }
                http_response_code(200);
            }
            catch (Exception $exception) {
                throw new Exception ( $exception->getMessage() );
            }
            break;
        case 'POST':
            try {   
                $post = json_decode(file_get_contents('php://input'), true);
                $result = createProduct($post);
                http_response_code(201);
            }catch (Exception $exception) {
                throw new Exception ( $exception->getMessage() );
            }
            break;
        case 'PUT':
            try {   
                $put = json_decode(file_get_contents('php://input'), true);
                $result = updateProduct( $put , $put["id"] );
                http_response_code(201);
            }catch (Exception $exception) {
                throw new Exception ( $exception->getMessage() );
            }
            break;
        case 'DELETE': 
            $id =   $parseURL[5] ;
            try {   
                
                if  (  delteProduct($id) ) {
                    $result = delteProduct($id);
                }
                else {
                    http_response_code(500);
                    throw new Exception ( "Server error !" );
                }   
                http_response_code(200);
            }catch (Exception $exception) {
                throw new Exception ( $exception->getMessage() );
            }
            break;
        default :
            throw new Exception("Method not allowed!");
            http_response_code(405);
            break;
    }
    return $result ;
}
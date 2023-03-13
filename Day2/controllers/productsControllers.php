<?php

// database integration

function getAllProducts () {
    
    $client = new MySQLHandler ('products');
    try {
        $client->connect();
    } catch (Exception $exception) {
        http_response_code(500);
        throw new Exception ('internal server error!');
    }
    $data = $client->get_data();
    return $data ;
}

function getSpecificProduct ($id) {
    if ( !is_numeric($id) ) {
        http_response_code(404);
        throw new Exception ('Product id must be a number');
    }
    else {
        $client = new MySQLHandler ('products');
        try {
            $client->connect();
        } catch (Exception $exception) {
            http_response_code(500);
            throw new Exception ('internal server error!');
        }
        $data = $client->get_record_by_id($id);
        if ( empty($data) ) {
            http_response_code(404);
            throw new Exception ("Resource dosn't exist");
        }
        return $data ; 
    }
}

function createProduct ($productData) { //$productData is a associate array
    $client = new MySQLHandler ('products');
    try {
        $client->connect();
    } catch (Exception $exception) {
        http_response_code(500);
        throw new Exception ('internal server error!');
    }
    $client->save($productData);
    
    // return the inserted data
    $data = getSpecificProduct($productData["id"]);
    return $data ;
}

function updateProduct($newProductData, $productID) {
    $client = new MySQLHandler ('products');
    
    // check first if the old product exists
    getSpecificProduct($productID); // if no will throw an error 404
    try {
        $client->connect();
    } catch (Exception $exception) {
        http_response_code(500);
        throw new Exception ('internal server error!');
    }
    $client->update($newProductData, $productID);

        // return the updated data
    $data = getSpecificProduct($productID);
    return $data ;
}

function delteProduct ($id) {
    $client = new MySQLHandler ('products');
    
    try {
        $client->connect();
    } catch (Exception $exception) {
        http_response_code(500);
        throw new Exception ('internal server error!');
    }

    return $client->delete($id) ;
}
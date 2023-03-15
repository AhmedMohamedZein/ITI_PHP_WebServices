<?php

// database integration

class Product {

    private $_client ;

    function __construct() {
        try {
            $this->_client = new MySQLHandler ('products');
            $this->_client->connect();
        } catch (Exception $exception) {
            http_response_code(500);
            throw new Exception ('internal server error!');
        }
    }

    public function getAllProducts () {
        $data =  $this->_client->get_data();
        return $data ;
    }
    
    public function getSpecificProduct ($id) {
        if ( !is_numeric($id) ) {
            http_response_code(404);
            throw new Exception ('Product id must be a number');
        }
        else {
            $data =  $this->_client->get_record_by_id($id);
            if ( empty($data) ) {
                http_response_code(404);
                throw new Exception ("Resource dosn't exist");
            }
            return $data ; 
        }
    }
    
    public function createProduct ($productData) { //$productData is a associate array

        // Create Product
        $this->_client->save($productData);
        
        // return the inserted data
        $data = getSpecificProduct($productData["id"]);
        return $data ;
    }
    
    public function updateProduct($newProductData, $productID) {
            //update Data
        $this->_client->update($newProductData, $productID);
    
            // return the updated data
        $data = getSpecificProduct($productID);
        return $data ;
    }
    
    public function delteProduct ($id) {    
        $data = $this->_client->delete($id);
        return $data ;
    }
}
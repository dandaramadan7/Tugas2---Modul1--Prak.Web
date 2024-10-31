<?php

namespace Controller;

include "Traits/ResponsFormatter.php"; 
include "controller/Controller.php";

use Traits\ResponseFormatter;

class ProductController extends Controller{
    use ResponseFormatter;
    
    public function _construct(){
        $this->controllerName = "Get All Product"; 
        $this->controllerMethod = "GET";

    }
    
    public function getAllProduct(){
        // Array Dummy Data
        $dummyData = [
            "Air Mineral",
            "Kebab",
            "Spaghetti",
            "Jus Jambu"

        ];

        $response = [ "controller_attribute" => $this->getControllerAttribute(), 
        "product" => $dummyData
        ];
        return $this->responseFormatter(200, "Success", $response);
    }

};
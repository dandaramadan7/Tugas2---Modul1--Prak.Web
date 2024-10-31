<?php

include "controller/ProductController.php";

use Controller\ProductController;

$productController = new ProductController;

echo $productController -> getAllProduct();
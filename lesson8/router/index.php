<?php

use Controllers\FilterController;
use Controllers\ProductController;

spl_autoload_register(function ($className) {
    require '../app/' . $className . '.php';
});

$action = $_GET['action'] ?? false;

if(!$action) {
    header('Location: /');
    exit();
}

$filterController = new FilterController();
$productController = new ProductController();

switch($action) {
    case "start":
        try {
            $filterController->getAllFilters();
            $productController->getAllProducts();
            header('Location: /');
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        break;
    case "add":
        try {
            $productController->addProduct($_POST, $_FILES);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        break;
    case "delete":
        try {
            $productController->deleteProduct($_POST);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        break;
    default:
        header('Location: /');
        break;
}
<?php

use App\Controllers\AuthController;
use App\Controllers\ThemeController;
use App\exceptions\CustomException;

spl_autoload_register(function ($className) {
    require '../' . $className . '.php';
});

if($_SERVER['REQUEST_METHOD'] === "GET") {
    header('Location: /pages/login.php');
}

$action = $_GET['action'] ?? false;

if(!$action) {
    header('Location: /pages/login.php');
}

$authController = new AuthController();
$themeController = new ThemeController();

switch ($action) {
    case "login":
        try {
            $authController->login($_POST);
        } catch (CustomException $e) {
            echo $e->getMessage();
        }
        break;
    case "logout":
        $authController->logout();
        break;
    case "signup":
        try {
            $authController->signup($_POST);
        } catch (CustomException $e) {
            echo $e->getMessage();
        }
        break;
    case "theme":
        try {
            $themeController->themeMode($_POST);
        } catch (CustomException $e) {
            echo $e->getMessage();
        }
        break;
    default:
        return false;
}
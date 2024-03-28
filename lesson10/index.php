<?php

use App\Controller\AuthController;
use App\Request;

spl_autoload_register(function ($className){
    require_once $className . '.php';
});

$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

$request = new Request();
$path = $request->formatPath($uri);

if($method === 'POST')
{
    $encodedBody = file_get_contents('php://input');
    $data = $request->formatData($encodedBody);

    switch ($path) {
        case '/registration':
            $controller = new AuthController();
            call_user_func([$controller, 'registration'], $data);
            break;
        default:
    }
}

if($method === 'GET')
{
    $args = $request->formatGetArgs($uri);
    print_r($args);

    switch ($path) {
        case '/':

            break;
        default:
    }
}

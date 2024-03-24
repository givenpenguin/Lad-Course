<?php

session_start();
session_write_close();

$referer = $_SERVER['HTTP_REFERER'];

if($_GET['action'] === 'clear')
{
    if(isset($_COOKIE['cart']))
    {
        unset($_COOKIE['cart']);
        setcookie('cart', '', -1, '/');
        header("Location: $referer");
        exit();
    }
}

$productId = $_GET['id'] ?? false;
$productIds = null;

if(isset($_COOKIE['cart']))
{
    $productIds = $_COOKIE['cart'];
    $idsArray = explode('/', $productIds);

    if(!in_array($productId, $idsArray))
    {
        $productIds .= "/$productId";
    }
} else {
    $productIds .= "$productId";
}

setcookie('cart', $productIds, time() + 86400 * 7, '/');
header("Location: $referer");
exit();
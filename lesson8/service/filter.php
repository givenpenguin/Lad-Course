<?php

$filters = $_POST ?? false;

if(!$filters) {
    header('Location: /');
    exit();
}

session_start();

$products = $_SESSION['products'];

function filterProducts($products, $filter, $keys): array
{
    $productsSort = [];
    foreach($products as $value) {
        if(in_array($value[$keys[0]], $filter[$keys[1]]))
        {
            $productsSort[] = $value;
        }
    }
    return $productsSort;
}

if(isset($filters))
{
    if(isset($filters['categories']))
    {
        $products = filterProducts($products, $filters, ['category', 'categories']);
    }
    if(isset($filters['brands']))
    {
        $products = filterProducts($products, $filters, ['brand', 'brands']);
    }
}

session_write_close();

$products = urlencode(serialize($products));
$filters = urlencode(serialize($filters));
header("Location: /?filtered_data=$products&selected_filters=$filters");

exit();
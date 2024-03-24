<?php

$products = [
    [
        "id" => 1,
        "article" => "rng-1",
        "name" => "Кольцо 1",
        "brand" => "SUNLIGHT",
        "material" => "Золото",
        "sample" => 925,
        "size" => 1,
        "insert" => "Фианит",
        "price" => 14990,
        "quantity" => 19,
        "category" => "Кольца",
        "image" => "resources/images/ring1.jpg"
    ],
    [
        "id" => 2,
        "article" => "rng-2",
        "name" => "Кольцо 2",
        "brand" => "SUNLIGHT",
        "material" => "Серебро",
        "sample" => 925,
        "size" => 3,
        "insert" => "Топаз",
        "price" => 3900,
        "quantity" => 68,
        "category" => "Кольца",
        "image" => "resources/images/ring2.jpg"
    ],
    [
        "id" => 3,
        "article" => "errng-1",
        "name" => "Серьги 1",
        "brand" => "OKAMI",
        "material" => "Золото",
        "sample" => 925,
        "lock" => "lock 2",
        "model" => "model 1",
        "insert" => "Фианит",
        "price" => 22990,
        "quantity" => 13,
        "category" => "Серьги",
        "image" => "resources/images/earring1.jpg"
    ],
    [
        "id" => 4,
        "article" => "errng-2",
        "name" => "Серьги 2",
        "brand" => "SUNLIGHT",
        "material" => "Платина",
        "sample" => 585,
        "lock" => "lock 1",
        "model" => "model 3",
        "insert" => "Фианит",
        "price" => 31900,
        "quantity" => 13,
        "category" => "Серьги",
        "image" => "resources/images/earring2.jpg"
    ],
    [
        "id" => 5,
        "article" => "chn-1",
        "name" => "Цепочка 1",
        "brand" => "SUNLIGHT",
        "material" => "Золото",
        "sample" => 925,
        "length" => 30,
        "insert" => "Аметист",
        "price" => 15990,
        "quantity" => 20,
        "category" => "Цепи",
        "image" => "resources/images/chain1.jpg"
    ],
    [
        "id" => 6,
        "article" => "chn-2",
        "name" => "Цепочка 2",
        "brand" => "OKAMI",
        "material" => "Керамика",
        "sample" => 925,
        "length" => 25,
        "insert" => "Бриллиант",
        "price" => 20900,
        "quantity" => 14,
        "category" => "Цепи",
        "image" => "resources/images/chain2.jpg"
    ]
];

file_put_contents("../products.json", json_encode($products, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));

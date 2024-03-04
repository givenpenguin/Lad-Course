<?php

$reputation = [
    "Вася" => 37,
    "Даша" => 56,
    "Гена" => 104,
    "Коля" => -1,
    "Леша" => 123,
    "Данила" => 60,
    "Андрей" => 99,
];

$cart = [
    13 => ['name' => 'Кеды', 'count' => 2, 'price' => 123],
    28 => ['name' => 'Самолет', 'count' => 1, 'price' => 9999999],
];


simple($reputation);

echo PHP_EOL . PHP_EOL;

data_search();

echo PHP_EOL . PHP_EOL;

glossary("Модуль");

echo PHP_EOL . PHP_EOL;

above_the_roof($reputation);

echo PHP_EOL . PHP_EOL;

danila_the_master($reputation);

echo PHP_EOL . PHP_EOL;

plus_rep($reputation);

echo PHP_EOL . PHP_EOL;

ban($reputation);

echo PHP_EOL . PHP_EOL;

task_file("C:\\php\\dev\\php8ts.lib");

echo PHP_EOL . PHP_EOL;

king_of_the_mountain($reputation);

echo PHP_EOL . PHP_EOL;

day_of_the_week("Every week has 7 days, See how many you can say: Sunday, Monday, Tuesday, Wednesday, Thursday, Friday, Saturday. What’s today?");

echo PHP_EOL . PHP_EOL;

summer("Ноябрь");

echo PHP_EOL . PHP_EOL;

cart($cart);
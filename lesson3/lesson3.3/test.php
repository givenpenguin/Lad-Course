<?php

$reputation = [
    "Вася" => 37,
    "Даша" => 56,
    "Гена" => 104,
    "Геша" => -25,
    "Коля" => -1,
    "Федя" => 0,
    "Леша" => 123,
    "Данила" => 60,
    "Гоша" => 0,
    "Андрей" => 99,
];

$users1 = ["Вася", "Даша", "Гена", "Геша", "Коля", "Федя", "Леша", "Данила", "Гоша", "Андрей",];
$users2 = ["Даша", "Гена", "Коля", "Федя", "Данила", "Гоша"];

$pages = [
    'О нас' => 'about.html',
    'Главная' => 'main.html',
    'Контакты' => 'contacts.html',
    'Загрузки' => 'downloads.html'
];

$cart = [
    13 => ['name' => 'Кеды', 'count' => 2, 'price' => 123],
    28 => ['name' => 'Самолет', 'count' => 1, 'price' => 9999999],
];

slava_kpss("Слава КПСС");

echo PHP_EOL . PHP_EOL;

paragraph();

echo PHP_EOL . PHP_EOL;

half("1000000");

echo PHP_EOL . PHP_EOL;

who_is_who($reputation);

echo PHP_EOL . PHP_EOL;

the_whole_rating($reputation);

echo PHP_EOL . PHP_EOL;

average_for_the_hospital($reputation);

echo PHP_EOL . PHP_EOL;

second_bottom($reputation);

echo PHP_EOL . PHP_EOL;

the_equator($reputation);

echo PHP_EOL . PHP_EOL;

get_out($users1, $users2);

zebra(10);

menu($pages, "Главная");

total($cart);

check();

mate();
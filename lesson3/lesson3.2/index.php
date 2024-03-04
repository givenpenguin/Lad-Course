<?php
include("test.php");

function simple($array){
    echo "Просто_1" . PHP_EOL;

    print_r($array);
}

function data_search(){
    echo "Поиск данных_2" . PHP_EOL;
    
    $key = "key4";
    $reputation = [
        "key1" => "data",
        "key2" => "moredata",
        "key3" => "somemoredata",
        "key4" => "bibaboba",
    ];

    if(isset($reputation[$key])) {
        print_r($reputation[$key]);
    } else {
        echo "Данные не найдены";
    }
}

function glossary($word){
    echo "Глоссарий_3" . PHP_EOL;
    
    $array = [
        "Константа" => "Константа — специальная числовая или строковая неизменяемая величина, котоая используется для PHP скриптов.",
        "Переменные" => "Переменная — ячейка памяти, в которй может содержаться числовая, строковая, логическая и др.
        величины, которые во время работы модуля могут изменяться. Применяется в нашем случае для скриптов PHP.",
        "Модуль" => "Модуль — совокупность всех перечисленных функций, классов, методов, макросов, шаблонов.",
        "Интерфейс" => "Интерфейс — совокупность средств, методов и правил взаимодействия между элементами системы.",
    ];

    echo isset($array[$word]) ? $array[$word] : "Данные не найдены";
}

function above_the_roof($array){
    echo "Выши крыши_4" . PHP_EOL;

    foreach($array as &$item) {
        if($item > 100) {
            $item = 100;
        }
    }
    unset($item);

    print_r($array);
}

function danila_the_master($array){
    echo "Данила Мастер_5" . PHP_EOL;
    
    $user = "Данила";

    echo "Статус пользователя $user: "; 

    foreach($array as $name => $rep) {
        if($user === $name) {
            if($rep <= 30) {
                echo "новичок";
            } else if($rep > 30 && $rep <= 61) {
                echo "мастер";
            } else {
                echo "грандмастер";
            }
        }
    }
}

function plus_rep($array){
    echo "Рейтинг +1_6" . PHP_EOL;

    $user = ["Андрей", "Женя"];
    $length = count($user);

    for($i = 0; $i < $length; $i++) {
        if(isset($array[$user[$i]])) {
            $array[$user[$i]] += 1;
        } else {
            $array[$user[$i]] = 0;
        }
    }

    print_r($array);
}

function ban($array){
    echo "Бан_7" . PHP_EOL;

    foreach($array as $name => $rep) {
        $users[] = $name;
    } 

    $length = count($array);
    
    for($i = 0; $i < $length; $i++) {
        if($array[$users[$i]] < 0) {
            unset($array[$users[$i]]);
        }
    }

    print_r($array);
}

function task_file($filePath){
    echo "Файл_8" . PHP_EOL;

    $array = explode("\\", $filePath);
    $length = count($array);

    $fileName = $array[$length - 1];
    $fileFolder = $array[$length - 2];

    echo "Название файла: $fileName" . PHP_EOL;
    echo "Название папки: $fileFolder" . PHP_EOL;
}

function king_of_the_mountain($array){
    echo "Царь горы_9" . PHP_EOL;

    asort($array);
    $keys = array_slice(array_keys($array), -3, 3);
    print_r(array_intersect_key($array, array_flip($keys)));
}

function day_of_the_week($text){
    echo "День недели_10" . PHP_EOL;

    $days_en = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];
    $days_ru = ["Понедельник", "Вторник", "Среда", "Четверг", "Пятница", "Суббота", "Воскресенье"];
    
    echo str_replace($days_en, $days_ru, $text) . PHP_EOL;
}

function summer($month){
    echo "Лето_11" . PHP_EOL;

    $arrMonth = ["Январь", "Февраль", "Март", "Апрель", "Май", "Июнь", "Июль", "Август", "Сентябрь", "Октябрь", "Ноябрь", "Декабрь"];
    $arrSeason = ["Зима", "Весна", "Лето", "Осень"];
    $isExist = false;

    foreach($arrMonth as $key => $item) {
        if($month === $item) {
            $isExist = true;

            if($key >= 0 && $key <= 1 && $key === 11) {
                echo "Месяц - $month, время года - $arrSeason[0]";
            } else if($key >= 2 && $key <= 4) {
                echo "Месяц - $month, время года - $arrSeason[1]";
            } else if($key >= 5 && $key <= 8) {
                echo "Месяц - $month, время года - $arrSeason[2]";
            } else if($key >= 8 && $key <= 11) {
                echo "Месяц - $month, время года - $arrSeason[3]";
            }
        }
    }

    echo !$isExist ? "Такого месяца не существует" : "";
}

function cart($array){
    echo "Корзина_12" . PHP_EOL;

    $id = 28;

    if(isset($array[$id])) {
        echo $array[$id]['price'];
    } else {
        echo "Такого товара в корзине не существует";
    }
}
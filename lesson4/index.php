<?php
include("test.php");

function swapTwoValues($value1, $value2) {
    echo "Функция_1" . PHP_EOL;
    
    echo "значение1 = $value1, значение2 = $value2" . PHP_EOL;
    $tmp = $value1;
    $value1 = $value2;
    $value2 = $tmp;
    echo "значение1 = $value1, значение2 = $value2" . PHP_EOL;
}

function sumOfValues(...$args) {
    echo "Функция_2" . PHP_EOL;

    $length = count($args);
    for($i = 0, $sum = 0; $i < $length; $i++) {
        $sum += $args[$i];
    }
    echo $sum;
}

function averageValue(...$args) {
    echo "Функция_3" . PHP_EOL;

    echo array_sum($args) / count($args);
}

function sumOfIntegers($a, $b) {
    echo "Функция_4" . PHP_EOL;

    echo gettype($a) && gettype($b) === "integer" ? $a + $b : $a . $b;
}

function medianOfValues(...$args) {
    echo "Функция_5" . PHP_EOL;

    sort($args);
    echo $args[(int)count($args) / 2];
}

function countOfCalls() {
    echo "Функция_6" . PHP_EOL;

    static $_COUNTER;
    $_COUNTER++;
    
    echo $_COUNTER . PHP_EOL;
}

function sumOfCalls($value) {
    echo "Функция_7" . PHP_EOL;

    static $_SUM_OF_CALLS;
    $_SUM_OF_CALLS += $value;

    echo $_SUM_OF_CALLS . PHP_EOL;
}

function averageOfCalls($value) {
    echo "Функция_8" . PHP_EOL;

    static $_CALLS;
    static $_SUM_OF_CALLS;

    $_CALLS++;
    $_SUM_OF_CALLS += $value;

    echo $_SUM_OF_CALLS / $_CALLS . PHP_EOL;
}

function sortValues(...$array) {
    echo "Функция_9" . PHP_EOL;

    $length = count($array);
    for($i = 0; $i < $length - 1; $i++) {
        for($j = $i + 1; $j < $length; $j++) {
            if($array[$i] > $array[$j]) {
                $tmp = $array[$i];
                $array[$i] = $array[$j];
                $array[$j] = $tmp;
            }
        }
    }
    print_r($array);
}

function factorial($value) {
    echo "Факториал_10" . PHP_EOL;

    if($value > 1) {
       $value *= factorial($value - 1);
    } else if($value === 0) {
        echo 1;
    } else if($value < 0) {
        echo "Факториал не определен";
    }
    
    return $value;

    echo PHP_EOL;
}

function primeNumber($value) {
    echo "Простое число_11" . PHP_EOL;

    for($i = 2; $i <= sqrt($value); $i++) {
        if($value % $i === 0) {
            echo "Число не является простым";
            return;
        }
    }
    echo "Число является простым";
}

function maxTwo($value1, $value2) {
    echo "Макс2_12" . PHP_EOL;

    $max = $value1;
    if($value2 > $max) {
        $max = $value2;
    }
    return $max;
}

function maxThree($value1, $value2, $value3) {
    echo "Макс3_13" . PHP_EOL;

    $max = maxTwo($value1, $value2);
    if($value3 > $max) {
        $max = $value3;
    }
    echo $max;
}

function arrMax($array) {
    echo "Максимум массива_14" . PHP_EOL;

    $length = count($array);
    $max = $array[0];
    for($i = 1; $i < $length; $i++) {
        $array[$i] > $max ? $max = $array[$i] : "";
    }
    echo $max;
}

function afterMax($array) {
    echo "Почти максимум_15" . PHP_EOL;

    $length = count($array);
    $max = $array[0];
    for($i = 1; $i < $length; $i++) {
        if($array[$i] > $max) {
            $max = $array[$i];
            $index = $i;
        }
    }

    if($array[$index] === $array[$length - 1]) {
        echo $array[0];
    } else {
        echo $array[$index + 1];
    }
}

function arrayFlip(&$array) {
    echo "Значение-ключ_16" . PHP_EOL;
    
    $flip = [];
    foreach($array as $key => $value) {
        $flip[$value] = $key;
    }
    print_r($flip);
}
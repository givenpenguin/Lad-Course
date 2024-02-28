<?php
include "test.php";

function even($number) {
    echo "Четное_1" . PHP_EOL;

    echo (int)($number % 2 === 0) . PHP_EOL;
}

function rooks_move($cage1, $cage2) {
    echo "Ход ладьи_2" . PHP_EOL;
    
    $cage1 = str_split($cage1);
    $cage2 = str_split($cage2);

    var_dump(($cage1)[0] === ($cage2)[0] ||
    ($cage1)[1] === ($cage2)[1]);
}

function kings_move($cage1, $cage2) {
    echo "Ход короля_3" . PHP_EOL;

    $cage1 = str_split($cage1);
    $cage2 = str_split($cage2);

    var_dump((($cage1)[0] === ($cage2)[0]) && (($cage2)[1] - ($cage1)[1] === 1 || ($cage1)[1] - ($cage2)[1] === 1) || //если ходим по вертикали

    (($cage1)[1] === ($cage2)[1]) && (($cage2)[0] - ($cage1)[0] === 1 || ($cage1)[0] - ($cage2)[0] === 1) || //если ходим по горизонтали

    (($cage2)[0] - ($cage1)[0] === 1 || ($cage1)[0] - ($cage2)[0] === 1) && (($cage2)[1] - ($cage1)[1] === 1 || ($cage1)[1] - ($cage2)[1] === 1)); //если ходим по диагонали
}

function guest($guest) {
    echo "Гость_4" . PHP_EOL;

    echo ($guest ? "Пожалуйста, авторизуйтесь!" : "") . PHP_EOL;
}

function module($number) {
    echo "Модуль_5" . PHP_EOL;

    if($number < 0) {
        echo ($number *= -1) . PHP_EOL;
        return;
    }

    echo $number . PHP_EOL;
}

function who_is_bigger($num1, $num2) {
    echo "Кто больше_6" . PHP_EOL;

    if($num1 > $num2) {
        echo "Максимальное число = " . $num1 . PHP_EOL;
        return;
    }
    echo "Максимальное число = " . $num2 . PHP_EOL;
}

function black_and_white($line, $column) {
    echo "Черное и белое_7" . PHP_EOL;

    echo (($line % 2 === 0) === ($column % 2 === 0) ?
    "черный" : "белый") . PHP_EOL;
}

function all_even($a, $b, $c) {
    echo "Все четные_8" . PHP_EOL;

    echo ($a % 2 === 0 && $b % 2 === 0 && $c % 2 === 0 ?
    "Все числа четные" : "Не все числа четные") . PHP_EOL;
}

function any_even($a, $b, $c) {
    echo "Есть ли четные_9" . PHP_EOL;

    echo ($a % 2 === 0 || $b % 2 === 0 || $c % 2 === 0 ?
    "Хотя бы одно число четное" : "Ни одно число не является четным") . PHP_EOL;
}

function weekend($day) {
    echo "Выходной_10" . PHP_EOL;

    echo (in_array($day, [6, 7]) ? "выходной" : "будний") . PHP_EOL;
}

function triangle($a, $b, $c) {
    echo "Треугольник_11" . PHP_EOL;

    echo (($a < $b + $c && $b < $a + $c && $c < $a + $b) ? "это треугольник" : "это не треугольник") . PHP_EOL;
}

function leap_year($year) {
    echo "Високосный год_12" . PHP_EOL;

    echo (($year % 4 === 0 && $year % 100 !== 0) || ($year % 400 === 0) ? "YES" : "NO") . PHP_EOL;
}

function sign($num) {
    echo "Знак_13" . PHP_EOL;

    if($num > 0) {
        echo 1;
    } else if($num < 0) {
        echo -1;
    } else {
        echo 0;
    }

    echo PHP_EOL;
}

function long_straw($a, $b, $c) {
    echo "Длинная соломинка_14" . PHP_EOL;

    $max = $a;

    if($b > $max) {
        $max = $b;
    }
    if($c > $max) {
        $max = $c;
    }

    echo $max . PHP_EOL;
}

function its_cold_today($t) {
    echo "Сегодня холодно_15" . PHP_EOL;

    if($t < -30) {
        echo "Оставайтесь дома!";
    } else if($t >= -30 && $t < -10) {
        echo "Сегодня холодно!";
    } else if($t >= -10 && $t <= 5) {
        echo "Не холодно!";
    } else if($t >= 5 && $t <= 15) {
        echo "Тепло!";
    } else if($t >= 15 && $t <= 25) {
        echo "Очень тепло!";
    } else if($t >= 25 && $t <= 35) {
        echo "Жарко!";
    } else if($t >= 35) {
        echo "Пекло!";
    }
    
    echo PHP_EOL;
}

function planner($hms_start_1, $hms_finish_1, $hms_start_2, $hms_finish_2) {
    echo "Ежедневник_16" . PHP_EOL;
    
    if(($hms_finish_1[0] > $hms_start_2[0]) && ($hms_start_2[0] > $hms_start_1[0])) {
        echo "True";
    } else if(($hms_finish_2[0] > $hms_start_1[0]) && ($hms_start_1[0] > $hms_start_2[0])) {
        echo "True";
    } else if($hms_start_1[0] === $hms_start_2[0] || $hms_start_1[0] === $hms_finish_2[0] || $hms_start_2[0] === $hms_finish_1[0]) {

        if(($hms_finish_1[1] > $hms_start_2[1]) && ($hms_start_2[1] > $hms_start_1[1])) {
            echo "True";
        } else if(($hms_finish_2[1] > $hms_start_1[1]) && ($hms_start_1[1] > $hms_start_2[1])) {
            echo "True";
        } else if ($hms_start_1[1] === $hms_start_2[1] || $hms_start_1[1] === $hms_finish_2[1] || $hms_start_2[1] === $hms_finish_1[1]) {

            if(($hms_finish_1[2] > $hms_start_2[2]) && ($hms_start_2[2] > $hms_start_1[2])) {
                echo "True";
            } else if(($hms_finish_2[2] > $hms_start_1[2]) && ($hms_start_1[2] > $hms_start_2[2])) {
                echo "True";
            } else if ($hms_start_1[2] === $hms_start_2[2] || $hms_start_1[2] === $hms_finish_2[2] || $hms_start_2[2] === $hms_finish_1[2]) {
                echo "True";
            } else {
                echo "False";
            }

        } else {
            echo "False";
        }

    } else {
        echo "False";
    }

    echo PHP_EOL;
}

function chocolate($n, $m, $k) {
    echo "Шоколадка_17" . PHP_EOL;
    
    echo "Шоколадку " . $n . " x " . $m . " долек ";

    if(($k % $n === 0 || $k % $m === 0) && ($k < $n * $m)) {
        echo "можно разломить на " . $k . " долек";
    } else {
        echo "нельзя разломить на " . $k . " долек";
    }

    echo PHP_EOL;
}

function weekend_2($n, $time) {
    echo "Выходной 2_18" . PHP_EOL;

    if($time > 7) {
        $time = $time % 7;
    }

    $k = $n;

    while($time > 0) {
        if($k < 6) {
            $k++;
        } else {
            $k = 0;
        }
        $time--;
    }

    if($k === 5 || $k === 6) {
        $k = 0;
    }

    echo "День доставки: " . $k . PHP_EOL;
}

function what_time_is_it($time) {
    echo "Который час_19" . PHP_EOL;

    if ($time % 10 === 1 && $time !== 11) {
        echo $time . " час";
    } else if(in_array($time % 10, [0, 5, 6, 7, 8, 9]) || $time > 10 && $time < 15) {
        echo $time . " часов";
    } else if(in_array($time % 10, [2, 3, 4])) {
        echo $time . " часа";
    }

    echo PHP_EOL;
}
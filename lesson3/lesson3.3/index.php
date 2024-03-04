<?php
include("test.php");

function slava_kpss($text) {
    echo "Слава КПСС_1" . PHP_EOL;

    $i = 0;
    $k = 5;

    while ($i < $k){
        $i++;
        echo "$i. $text" . PHP_EOL;
    }
}

function paragraph() {
    echo "Абзац_2" . PHP_EOL;

    $i = 0;
    $k = 5;

    do {
        $i++;
        echo "<p>Абзац $i</p>" . PHP_EOL;
    } while ($i < $k);
}

function half($a) {
    echo "Половина_3" . PHP_EOL;

    $b = 100;
    $day = 0;

    while($a >= $b) {
        $a /= 2;
        $day++;
    }

    echo $day . PHP_EOL;
}


function who_is_who($array) {
    echo "Кто есть кто_4" . PHP_EOL;

    echo "| Имя \t|Рейтинг|" . PHP_EOL;

    foreach($array as $name => $rep) {
        echo "| $name  | $rep \t|" . PHP_EOL;
    }
}

function the_whole_rating($array) {
    echo "Весь рейтинг_5" . PHP_EOL;

    $sum = 0;

    foreach($array as $name => $rep) {
        $sum += $rep;
    }

    echo $sum;
}

function average_for_the_hospital($array) {
    echo "Средняя по больнице_6" . PHP_EOL;

    $count = 0;
    $sum = 0;

    foreach($array as $item) {
        if($item !== 0) {
            $count++;
            $sum += $item;
        }
    }

    echo "Средний рейтинг = " . $sum / $count . PHP_EOL;
}

function second_bottom($array){
    echo "Второе дно_7" . PHP_EOL;

    foreach($array as &$item) {
        if($item < 0) {
            $item = 0;
        }
    }
    unset($item);

    print_r($array);
}

function the_equator($array){
    echo "Экватор_8" . PHP_EOL;

    foreach($array as $name => $rep) {
        if($rep > 50) {
            echo "Рейтинг пользователя $name = $rep" . PHP_EOL;
        }
    }   
}

function get_out($users1, $users2){
    echo "Выйди вон_9" . PHP_EOL;

    $lenth1 = count($users1);
    $lenth2 = count($users2);

    for($i = 0; $i < $lenth1; $i++) {
        for($j = 0; $j < $lenth2; $j++) {
            if($users1[$i] === $users2[$j]) {
                unset($users1[$i]);
                break;
            }
        }
    }

    print_r($users1);

    //или

    // print_r(array_diff($users1, $users2));
}

function zebra($rowCount){
    echo "Зебра_10" . PHP_EOL;

    echo "<table border='1'>";

    for($i = 0; $i < $rowCount; $i++) {
        $bgColor = ($i % 2 === 0) ? "lightgrey" : "white";

        echo "<tr style='background-color: $bgColor'>";
        echo "<td>$i</td>";
        echo "</tr>";
    }

    echo "</table>";
}

function menu($pages, $currentPage){
    echo "Меню_11-12" . PHP_EOL;

    echo "<div>";

    foreach($pages as $name => $link) {
        echo "<a href='$link' style='margin:0 10px; ";

        if(strtolower($name) === strtolower($currentPage)) {
            echo "color:red'>";
        } else {
            echo "color:black'>";
        }

        echo "$name</a>";
        
    }

    echo "</div>";
}

function total($cart){
    echo "Зебра_10" . PHP_EOL;

    $sum = 0;

    echo "<table border='1'>";
    echo <<<HEADER
        <tr>
            <td>Наименование</td>
            <td>Количество</td>
            <td>Цена</td>
        </tr>
    HEADER;

    foreach($cart as $item){
        echo "<tr>";

        [
            "name" => $name,
            "count" => $count,
            "price" => $price,
        ] = $item;

        echo <<<MAIN
            <td>$name</td>
            <td>$count</td>
            <td>$price</td>
        MAIN;
        
        $sum += $price * $count;

        echo "</tr>";
    }

    echo <<<FOOTER
        <tr>
            <td></td>
            <td>Стоимость</td>
            <td>$sum</td>
        </tr>
    FOOTER;

    echo "</table>";
}

function check(){
    echo "Шах_11" . PHP_EOL;

    //буквы
    $lettersArray = ["a", "b", "c", "d", "e", "f", "g", "h"];
    $letters = "<tr><td></td>";

    foreach($lettersArray as $letter) {
        $letters .= "<td style='border:1px solid black; width:20px; height:20px;'>$letter</td>";
    }
    $letters .= "</tr>";

    echo "<table style='border:1px solid black; border-collapse:collapse; text-align:center;'>"; //начало таблицы

    echo $letters; //буквы

    for($i = 8; $i > 0; $i--) {
        $color1 = ($i % 2 === 0) ? "white" : "grey";
        $color2 = ($i % 2 === 0) ? "grey" : "white";

        echo "<tr>";
        echo "<td style='border:1px solid black; width:20px; height:20px;'>$i</td>"; //цифры

        for($j = 0; $j < 8; $j++) {
            $bgColor = ($j % 2 === 0) ? $color1 : $color2;

            echo "<td style='border:1px solid black; width:20px; height:20px; background-color:$bgColor'></td>"; //клетки
        }

        echo "<td style='border:1px solid black; width:20px; height:20px;'>$i</td>"; //цифры
        echo "</tr>";
    }

    echo $letters; //буквы

    echo "</table>"; //конец таблицы
}

function mate(){
    echo "Мат_12" . PHP_EOL;

    $nameOfDaysArray = ["Пн", "Вт", "Ср", "Чт", "Пт", "Сб", "Вс"];
    $nameOfDays = "<tr>";

    foreach($nameOfDaysArray as $day) {
        $nameOfDays .= "<td style='border:1px solid black; width:20px; height:20px; padding: 3px'>$day</td>";
    }
    $nameOfDays .= "</tr>";

    echo "<div style='max-width:190px; text-align:center'>" . date("Y")  . " " . strftime('%B') . "</div>"; //год и месяц

    echo "<table style='border:1px solid black; border-collapse:collapse; max-width:190px;'>"; //начало таблицы

    echo $nameOfDays; //дни недели    

    $countOfDays = date("t"); //количество дней в месяце
    $firstDay = date("N", strtotime(date("Y-m-1"))) - 1; //день недели, с которого начался месяц
    $lastDay = date("N", strtotime(date("Y-m-$countOfDays"))) - 1; //день недели, которым закончился месяц
    $today = getdate()["mday"];

    for($i = 0, $counter = 1; $i < 6; $i++) {
        echo "<tr>";
        for($j = 0; $j < 7; $j++, $counter++) {
            if($i === 0 && $j !== $firstDay) {
                while($j < $firstDay) {
                    echo "<td style='border:1px solid black; width:20px; height:20px;'></td>"; //пустые ячейки
                    $j++;
                }
            }
            
            if($counter <= $countOfDays) {
                if($counter === $today)
                    echo "<td style='border:1px solid black; width:20px; height:20px; background-color:red'>$counter</td>";
                else 
                    echo "<td style='border:1px solid black; width:20px; height:20px;'>$counter</td>";
            }

            if($counter === $countOfDays) {
                while($j < 6) {
                    echo "<td style='border:1px solid black; width:20px; height:20px;'></td>";
                    $j++;
                }
            }
        }
        echo "</tr>";
    }
    echo "</table>"; //конец таблицы
}
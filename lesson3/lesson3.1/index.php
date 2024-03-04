<?php
include("test.php");

function article($num){
    echo "Артикул_1" . PHP_EOL;
    
    printf("%06d", $num);
}

function hours($s){
    echo "Часы_2" . PHP_EOL;

    $h = $s / 3600;
    $m = ($s - (int)$h * 3600) / 60;
    $s = ($s - (int)$h * 3600 - (int)$m * 60);

    printf("%02d:%02d:%02d", $h, $m, $s);
}

function fio($lastName, $secondName, $firstName){
    echo "ФИО_3" . PHP_EOL;
    
    printf("%s %s %s", $lastName, $secondName, $firstName);
}

function short_password($pass){
    echo "Короткий пароль_4" . PHP_EOL;

    $length = mb_strlen($pass);
    echo $length < 8 ? "Слишком короткий пароль!" : $length;

    echo PHP_EOL;
}

function space($pass){
    echo "Пробел_5" . PHP_EOL;

    echo mb_strpos($pass, " ") ? "Пароль не должен содержать пробелы!" : "Пароль принят";

    echo PHP_EOL;
}

function evenly($str1, $str2){
    echo "Ровно_6" . PHP_EOL;

    echo mb_strlen($str1) === mb_strlen($str2) ? "Количество букв совпадает" : "Количество букв не совпадает";

    echo PHP_EOL;
}

function details($text){
    echo "Подробнее_7" . PHP_EOL;

    $details = <<<DETAILS
    <a href=#>Подробнее...</a>
    DETAILS;

    mb_strlen($text) > 50 ? printf("%.50s %s", $text, $details) : printf($text);

    echo PHP_EOL;
}

function shortly($word){
    echo "Короче_8" . PHP_EOL;

    echo mb_strlen($word) > 7 ? mb_substr($word, 0, 4) . "-" . mb_substr($word, -2, 2): $word;

    echo PHP_EOL;
}

function cows($text){
    echo "Коровы_9" . PHP_EOL;

    echo mb_substr_count($text, "м");

    echo PHP_EOL;
}

function caps_lock($pass){
    echo "Caps Lock_10" . PHP_EOL;
    
    $validate = "qwerty123";

    echo mb_convert_case($validate, MB_CASE_UPPER) === $pass ? "Возможно нажата клавиша Caps Lock" : "Добро пожаловать";

    echo PHP_EOL;
}

function register_independent_cows($text){
    echo "Регистронезависимые коровы_11" . PHP_EOL;
    
    $search = "м";
    echo mb_substr_count(mb_strtolower($text), mb_strtolower($search));

    echo PHP_EOL;
}

function italic($text){
    echo "Курсив_12" . PHP_EOL;
    
    $search = "ТрАкТоР";
    $count = mb_substr_count(mb_strtolower($text), mb_strtolower($search));
    $pos = 0;

    for($i = 0; $i < $count; $i++) {
        $pos = mb_strpos(mb_strtolower($text), mb_strtolower($search), $pos);
        $word = mb_substr($text, $pos, mb_strlen($search));

        $pos += mb_strlen($search);

        $tpl = <<<TPL
        <i>${word}</i>
        TPL;
    
        $text = str_replace($word, $tpl, $text);
    }
    
    echo $text;
    
    echo PHP_EOL;
}

function tag($text){
    echo "Тег_13" . PHP_EOL;
    
    $symbols = ["<", ">", "</"];
    $open = mb_strpos($text, $symbols[0]);

    if(isset($open)) {
        if($close = mb_strpos($text, $symbols[1], $open)) {
            if($outputText = substr($text, $close + 1)) {
                echo strstr($outputText, $symbols[2], true);
            }
        }
    }
    
    echo PHP_EOL;
}

function no_comments($text){
    echo "Без комментариев_14" . PHP_EOL;
    
    $symbols = ["/*", "*/"];
    $open = mb_strpos($text, $symbols[0]);

    if(isset($open)) {
        if($close = mb_strpos($text, $symbols[1], $open)) {
            if($substring = substr($text, $open, $close - $open + 2)) {
                echo str_replace($substring, "", $text);
            }
        }
    }
    
    echo PHP_EOL;
}

function search($text){
    echo "Поиск_15" . PHP_EOL;
    
    $search = "aboba";
    $wordPos = mb_strpos(mb_strtolower($text), mb_strtolower($search));

    $dots = [];    
    $dotPos = 0;

    if(!$wordPos) {
        echo "Слово отсутствует в тексте";
        return;
    }

    $dotsCount = mb_substr_count($text, ".");
    for($i = 0; $i < $dotsCount; $i++) {
        $dotPos = mb_strpos($text, ".", $dotPos + 1);
        $dots[$i] = $dotPos + 1;
    }  

    foreach($dots as $dot) {
        if($dot < $wordPos) {
            $beginSentense = $dot;
        } else {
            $endSentense = $dot;
            break;
        }
    }

    if($endSentense === $dots[0]) {
        $beginSentense = 0;
    }

    $sentence = mb_substr($text, $beginSentense, $endSentense - $beginSentense);
    $text = str_replace($sentence, "<i>${sentence}</i>", $text);
    
    echo $text;
    
    echo PHP_EOL;
}

function mvc($name){
    echo "MVC_16" . PHP_EOL;

    $pageName = $name;

    $directory = ".\MVC\\";

    $modelFile = glob($directory . "*_model.txt");
    $viewFile = glob($directory . "*_view.txt");

    if(!empty($pageName)) {
        $pageName = strtolower($name);
    } else {
        $pageName = strtolower("Main");
    }    
    
    if (rename(implode($modelFile), $directory . "${pageName}_model.txt")) {
        echo "Файл _model.txt успешно переименован." . PHP_EOL;
    } else {
        echo "Не удалось переименовать файл _model.txt." . PHP_EOL;
    }

    if (rename(implode($viewFile), $directory . "${pageName}_view.txt")) {
        echo "Файл _view.txt успешно переименован." . PHP_EOL;
    } else {
        echo "Не удалось переименовать файл _view.txt." . PHP_EOL;
    }
    
    echo PHP_EOL;
}
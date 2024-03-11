<?php
include("test.php");

//Задача 1
function isGuest() {
    $name = $_GET['name'] ?? 'Гость';
    return "Привет, $name"; 
}

//Задача 2
function glossary($terms) {
    $term = $_GET['term'];

    return $terms[$term] ? $term . $terms[$term] : 'Такого термина нет';
}

//Задача 3
function aboutUs() {
    $routes = [
        'home' => [
            'title' => 'Главная',
            'content' => 'Это главная страница',
        ],
        'about' => [
            'title' => 'О нас',
            'content' => 'Страница, где написано всё про нас',
        ],
        'delivery' => [
            'title' => 'Доставка',
            'content' => 'Здесь описаны способы доставки',
        ],
        'privacy-policy' => [
            'title' => 'Политика конфиденциальности',
            'content' => 'Прочитайте важную информацию',
        ],
    ];

    $tmp = <<<TMP
        <div>{{title}}</div>
        <div>{{content}}</div>
    TMP;

    $route = $_GET['page'] ?? 'home';

    foreach($routes as $name => $item) {
        echo "<a style='margin-right:10px; color:black' href=index.php?page={$name}>{$item['title']}</a>";
    }
    
    if(!isset($routes[$route])) {
        $tmp = "<div>404 Page not found</div>";
    }

    [
       'title' => $title,
       'content' => $content, 
    ] = $routes[$route];

    echo str_replace(["{{title}}", "{{content}}"], [$title, $content], $tmp);
}

//Задача 4
function textGlossary($terms) {
    $text = "Какой-то текст константа,
    еще какой-то текст переменная ну и модуль,
    а так же интерфейс.";

    foreach($terms as $term => $definition){
        $links[] = "<a style='color:black' href=index.php?term=" . mb_strtolower($term) . ">" . mb_strtolower($term) . "</a>";
        $search[] = mb_strtolower($term);
    }

    echo str_replace($search, $links, $text);

    function strapper($str, $encoding = 'UTF8') {
        return
            mb_strtoupper(mb_substr($str, 0, 1, $encoding), $encoding) .
            mb_substr($str, 1, mb_strlen($str, $encoding), $encoding);
    };

    if($term = $_GET['term']) {
        $term = strapper($term);
        echo "<div>" . $term . $terms[$term] . "</div>";
    }
}

//Задача 5
function onlineCalculator() {
    $area = $_POST['area'];
    $power = $_POST['power'];

    if($power > 0) {
        $metr = 100 / $power;
        $count = ceil($metr * $area);
    }

    echo "Кол-во секций: $count";
}

//Задача 6
function selectText() {
    $text = "Какой-то текст константа,
    еще какой-то текст переменная ну и модуль,
    а так же интерфейс.";

    $keywords = explode(" ", mb_strtolower($_POST['keywords']));
    
    $text = explode(" ", $text);
    $length = count($text);
    
    for($i = 0; $i < $length; $i++) {
        for($j = 0; $j < $length; $j++) {
            if(mb_strtolower($keywords[$i]) === mb_strtolower($text[$j])) {
                $text[$j] = "<span style='color:red'>{$text[$j]}</span>";
            }
        }
    }

    return implode(" ", $text);
}

//Задача 8
function uploadFile() {
    $dirName = __DIR__ . '/img/';

    if(isset($_FILES['file'])) {

        if($_FILES['file']['size'] < 2097152) {

            if(in_array($_FILES['file']['type'], ['image/jpg', 'image/jpeg', 'image/gif', 'image/png'])) {

                if(move_uploaded_file($_FILES['file']['tmp_name'], $dirName . $_FILES['file']['name'])) {
                    echo "Файл загружен";
                }

            } else {
                echo "Можно загрузить файлы только с расширением .jpg, .gif, .png";
            }

        } else {
            echo "Размер файла равен или превышает 2 МБ";
        }
    }
}
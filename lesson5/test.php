<?php
$terms = [
    "Константа" => " — специальная числовая или строковая неизменяемая величина, котоая используется для PHP скриптов.",
    "Переменная" => " — ячейка памяти, в которй может содержаться числовая, строковая, логическая и др.
    величины, которые во время работы модуля могут изменяться. Применяется в нашем случае для скриптов PHP.",
    "Модуль" => " — совокупность всех перечисленных функций, классов, методов, макросов, шаблонов.",
    "Интерфейс" => " — совокупность средств, методов и правил взаимодействия между элементами системы.",
];

echo "<ol>";
echo "<li>" . isGuest() . "</li><br>";
echo "<li>" . glossary($terms) . "</li><br>";
echo "<li>"; aboutUs(); echo "</li><br>";
echo "<li>"; textGlossary($terms); echo "</li><br>";
echo "<li>";
?>

<form action="" method="post">
    <input type="number" name="area" placeholder="Площадь">
    <input type="number" name="power" placeholder="Мощность">
    <button type="submit">Вычислить</button>
</form>

<?php
onlineCalculator();
echo "</li><br>";
echo "<li>";
?>

<form action="" method="post">
    <input type="text" name="keywords" placeholder="Ключевые слова">
    <button type="submit">Выделить</button>
</form>

<?php
echo selectText();
echo "</li><br>";
echo "<li>";
?>

<span>Выберите файл .jpg, .gif, .png размером меньше 2 МБ</span><br><br>
<form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="file">
    <button type="submit">Загрузить</button>
</form>

<?php
echo uploadFile();
echo "</li><br>";
echo "</ol>";
?>
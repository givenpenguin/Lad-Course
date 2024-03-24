<?php
session_start();

$categories = $_SESSION['filters']['categories'] ?? false;

$selectedOption = $_POST['category'] ?? '';


echo '<pre>';
print_r($selectedOption);
echo '</pre>';

echo '<pre>';
print_r($_SESSION);
echo '</pre>';
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админка</title>
</head>
<body>
<div class="wrapper">
    <h3>Добавить товар</h3>
    <form method="post">
        <label for="category">Категория:</label><select id="category" name="category" onchange="this.form.submit()">
            <option value="default" selected>Выберите категорию</option>
            <?php
            foreach ($categories as $option) {
                echo "<option value='{$option['name']}'" . ($option['name'] === $selectedOption ? 'selected' : '') . ">{$option['name']}</option>";
            }
            ?>
        </select>
    </form>
    <form class="add-product" action="../router/index.php?action=add" method="post" enctype="multipart/form-data">
        <span>Артикул:</span><input required="required" type="text" name="article">
        <span>Название:</span><input required="required" type="text" name="name">
        <span>Бренд:</span><input required="required" type="text" name="brand">
        <span>Материал:</span><input required="required" type="text" name="material">
        <span>Проба:</span><input required="required" type="text" name="sample">
        <br>

        <?php
        if (!empty($selectedOption) && isset($categories)) {
            switch($selectedOption) {
                case "Кольца":
                    echo "<span>Размер:</span><input required='required' type='text' name='size'>";
                    echo "<span>Вставка:</span><input required='required' type='text' name='insert'>";
                    break;
                case "Серьги":
                    echo "<span>Замок:</span><input required='required' type='text' name='lock'>";
                    echo "<span>Модель:</span><input required='required' type='text' name='model'>";
                    break;
                case "Цепи":
                    echo "<span>Длина:</span><input required='required' type='text' name='length'>";
                    break;
                default:
                    echo '';
                    break;
            }
        }
        ?>

        <br>
        <span>Количество:</span><input required="required" type="text" name="quantity">
        <span>Цена:</span><input required="required" type="text" name="price">
        <span>Фото:</span><input required="required" type="file" name="image">

        <button type="submit">Добавить</button>
    </form>
    <h3>Удалить товар</h3>
    <form class="delete-product" action="../router/index.php?action=delete" method="post">
        <span>Артикул:</span><input required="required" type="text" name="article">
        <button type="submit">Удалить</button>
    </form>
</div>
</body>
</html>

<style>
    .wrapper {
        font-family: Arial, serif;
        position: absolute;
        top: 10%;
        left: 0;
        right: 0;
        text-align: center;
    }
    .add-product, .delete-product {
        display: flex;
        flex-direction: column;
        margin: 10px auto;
        max-width: 200px;
    }
    input {
        margin: 0px 0px 10px 0px;
    }
</style>
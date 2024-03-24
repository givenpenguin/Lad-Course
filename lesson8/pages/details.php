<?php

session_start();
session_write_close();

$products = $_SESSION['products'] ?? false;
$product = [];

foreach($products as $item) {
    if($item['id'] === (int)$_GET['id'])
    {
        $product = $item;
    }
}

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../resources/css/details.css">
    <title>Детали</title>
</head>
<body>

<div class="container">
    <div class="product">
        <img src="../<?php echo $product['image'] ?>" alt="<?php echo $product['name'] ?>">
        <h2><?php echo $product['name'] ?></h2>
        <h3 class="description">Цена: <?php echo $product['price'] ?> руб.</h3>
        <h3>Описание:</h3>
        <div class="product-info">
            <span class="description">Артикул: <?php echo $product['article'] ?></span>
            <span class="description">Категория: <?php echo $product['category'] ?></span>
            <span class="description">Бренд: <?php echo $product['brand'] ?></span>
            <span class="description">Материал: <?php echo $product['material'] ?></span>
            <span class="description">Проба: <?php echo $product['sample'] ?></span>

            <?php if(isset($product['size'])): ?>
            <span class="description">Размер: <?php echo $product['size'] ?></span>
            <?php endif ?>
            <?php if(isset($product['insert'])): ?>
            <span class="description">Вставка: <?php echo $product['insert'] ?></span>
            <?php endif ?>
            <?php if(isset($product['lock'])): ?>
                <span class="description">Замок: <?php echo $product['lock'] ?></span>
            <?php endif ?>
            <?php if(isset($product['model'])): ?>
                <span class="description">Модель: <?php echo $product['model'] ?></span>
            <?php endif ?>
            <?php if(isset($product['length'])): ?>
                <span class="description">Длина: <?php echo $product['length'] ?> см.</span>
            <?php endif ?>

            <span class="description">В наличии: <?php echo $product['quantity'] ?> шт.</span>
            <a href="/service/cart.php?id=<?php echo $product['id'] ?>" class="btn">Добавить в корзину</a>
        </div>
    </div>
</div>

</body>
</html>

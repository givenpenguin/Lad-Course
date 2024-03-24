<?php

session_start();
session_write_close();

$sessionProducts = $_SESSION['products'] ?? false;
$idsArray = explode('/', $_COOKIE['cart'] ?? false);
$products = [];

foreach($sessionProducts as $item)
{
    if(in_array($item['id'], $idsArray))
    {
        $products[] = $item;
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../resources/css/cart.css">
    <title>Корзина</title>
</head>
<body>

<div class="container">
    <h1>Корзина товаров</h1>
    <table>
        <thead>
        <tr>
            <th>Товар</th>
            <th>Цена, руб.</th>
            <th>Количество</th>
            <th>Всего, руб.</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($products as $product): ?>
        <tr>
            <td><?php echo $product['name'] ?></td>
            <td><?php echo $product['price'] ?></td>
            <td>1</td>
            <td><?php echo $product['price'] ?></td>
        </tr>
        <?php endforeach ?>
        </tbody>
    </table>
    <div class="total">
        <strong>Итого: $35.00</strong>
    </div>
    <a href="#" class="checkout-btn">Оформить заказ</a>
    <a href="/service/cart.php?action=clear" class="checkout-btn">Очистить корзину</a>
</div>
</body>
</html>

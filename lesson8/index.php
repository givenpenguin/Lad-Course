<?php

session_start();
session_write_close();

if(empty($_SESSION['products']))
{
    header('Location: /router/index.php?action=start');
    exit();
}

$categories = $_SESSION['filters']['categories'];
$brands = $_SESSION['filters']['brands'];

if(empty($_GET['filtered_data']))
{
    $products = $_SESSION['products'];
} else {
    $products = unserialize(urldecode($_GET['filtered_data']));
    $filters = unserialize(urldecode($_GET['selected_filters']));
}

//echo '<pre>';
//print_r($_SESSION);
//echo '</pre>';
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Интернет-магазин</title>
    <link rel="stylesheet" href="resources/css/style.css">
</head>
<body>
<header>
    <h1>SUNLIGHT</h1>
</header>
<main>
    <aside class="filters">
        <a href="/pages/cart.php" class="btn">Корзина</a>
        <h2>Фильтры</h2>
        <div class="filter-category">
            <form action="/service/filter.php" method="post">
                <h3>Категория</h3>
                <ul>
                    <?php foreach($categories as $category): ?>
                    <li>
                        <input type="checkbox" id="categories<?php echo $category['id'] ?>" name="categories[]" value="<?php echo $category['name'] ?>"
                            <?php echo isset($filters['categories']) && in_array($category['name'], $filters['categories']) ? 'checked' : '' ?>>
                        <label for="categories<?php echo $category['id'] ?>"><?php echo $category['name'] ?></label>
                    </li>
                    <?php endforeach ?>
                </ul>
                <h3>Бренд</h3>
                <ul>
                    <?php foreach($brands as $brand): ?>
                        <li>
                            <input type="checkbox" id="brands<?php echo $brand['id'] ?>" name="brands[]" value="<?php echo $brand['name'] ?>"
                                <?php echo isset($filters['brands']) && in_array($brand['name'], $filters['brands']) ? 'checked' : '' ?>>
                            <label for="brands<?php echo $brand['id'] ?>"><?php echo $brand['name'] ?></label>
                        </li>
                    <?php endforeach ?>
                </ul>
                <button type="submit">Применить</button>
            </form>
            <form action="/router/index.php?action=start" method="post">
                <button type="submit">Сбросить</button>
            </form>
        </div>
    </aside>
    <section class="products">

        <?php foreach($products as $product): ?>
        <div class="product">
            <img src="<?php echo $product['image']['fileName'] ?>" alt="<?php echo $product['name'] ?>">
            <h3><?php echo $product['name'] ?></h3>
            <span class="description">Категория: <?php echo $product['category'] ?></span>
            <span class="description">Бренд: <?php echo $product['brand'] ?></span>
            <span class="description"><?php echo $product['price'] ?> руб.</span>
            <a href="/pages/details.php?id=<?php echo $product['id'] ?>" class="btn">Подробнее</a>
            <a href="/service/cart.php?id=<?php echo $product['id'] ?>" class="btn">В корзину</a>
        </div>
        <?php endforeach ?>

    </section>
</main>
<footer>
    <p>&copy; 2024 SUNLIGHT</p>
</footer>
</body>
</html>
<?php
    session_start();
    if(!isset($_SESSION['login'])) {
        header('Location: login.php');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная</title>
</head>
<body>
    <div class="wrapper">
        <h3 class="greeting">Добрый день <?php echo $_SESSION['firstname'] ?></h3>
        <form action="logout.php" method="post">
            <button class="exit" type="submit">Выйти</button>
        </form>
    </div>
</body>
</html>

<style>
    .wrapper {
        font-family: Arial;
        position: absolute;
        top: 35%;
        left: 0;
        right: 0;
        text-align: center;
    }
    .greeting {
        margin: 0px 0px 10px 0px;
    }
</style>

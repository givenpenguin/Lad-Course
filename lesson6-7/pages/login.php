<?php
session_start();

if(isset($_SESSION['user'])) {
    header('Location: /');
    exit();
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
</head>
<body>
<div class="wrapper">
    <h3>Авторизация</h3>
    <form class="authorization" action="/route/index.php?action=login" method="post">
        <input required="required" class="login" type="text" name="login" placeholder="Логин">
        <input required="required" class="password" type="password" name="password" placeholder="Пароль">
        <button type="submit">Войти</button>
    </form>
    <a class="link" href="signup.php">Зарегистрироваться</a>
</div>
</body>
</html>

<style>
    .wrapper {
        font-family: Arial, serif;
        position: absolute;
        top: 35%;
        left: 0;
        right: 0;
        text-align: center;
    }
    .authorization {
        display: flex;
        flex-direction: column;
        margin: 10px auto;
        max-width: 200px;
    }
    input {
        margin: 0px 0px 10px 0px;
    }
    .link {
        font-size: 13px;
    }
</style>
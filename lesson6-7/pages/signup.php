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
    <title>Регистрация</title>
</head>
<body>
<div class="wrapper">
    <h3>Регистрация</h3>
    <form class="registration" action="/route/index.php?action=signup" method="post">
        <input required="required" class="username" type="text" name="username" placeholder="Имя">
        <input required="required" class="login" type="text" name="login" placeholder="Логин">
        <input required="required" class="password" type="password" name="password" placeholder="Пароль">
        <input required="required" class=password-conf" type="password" name="password-conf" placeholder="Повторить пароль">
        <button type="submit">Зарегистрироваться</button>
    </form>
    <a class="link" href="login.php">Авторизоваться</a>
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
    .registration {
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
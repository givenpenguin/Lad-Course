<?php
    $users = [
        1 => [
            'login' => '123',
            'password' => '123',
            'firstname' => 'user1',
        ],
        2 => [
            'login' => 'asdf321',
            'password' => '321',
            'firstname' => 'user2',
        ],
    ];

    $login = $_POST['login'];
    $password = $_POST['password'];

    if(isset($login) && isset($password)) {
        foreach($users as $id => $data) {
            if($data['login'] === $login) {
                if($data['password'] === $password) {
                    session_start();
                    $_SESSION['login'] = $login;
                    $_SESSION['firstname'] = $data['firstname'];
                    header('Location: index.php');
                    exit();
                }
            }
        }
        if(!isset($_SESSION['login'])) {
            echo "<script>alert('Введены неверные данные');</script>";
        }
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
        <form class="authorization" action="" method="post">
            <input class="login" type="text" name="login" placeholder="Логин">
            <input class="password" type="password" name="password" placeholder="Пароль">
            <button type="submit">Войти</button>
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
    .authorization {
        display: flex;
        flex-direction: column;
        margin: 0 auto;
        max-width: 200px;
    }
    input {
        margin: 0px 0px 10px 0px;
    }
</style>

<?php
session_start();

if(!isset($_SESSION['user'])) {
    header('Location: /pages/login.php');
    exit();
}

echo'<pre>';
print_r($_SESSION['user']);
echo'</pre>';
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
        <h3 class="greeting">Привет, <?php echo $_SESSION['user']['username'] ?></h3>
        <form class="settings" action="/route/index.php?action=theme" method="post">
            <label class="label" for="dark">
                <input id="dark" type="radio" name="theme" value="dark" <?php echo $_SESSION['user']['theme'] === 'dark' ? 'checked' : '' ?>>
                <span>Темная тема</span>
            </label>
            <label class="label" for="light">
                <input id="light" type="radio" name="theme" value="light" <?php echo $_SESSION['user']['theme'] === 'light' ? 'checked' : '' ?>>
                <span>Светлая тема</span>
            </label>
            <button class="btnSubmit" type="submit">Применить</button>
        </form>
        <form class="exit" action="/route/index.php?action=logout" method="post">
            <button class="btnExit" type="submit">Выйти</button>
        </form>
    </div>
</body>
</html>

<style>
    body {
        <?php echo $_SESSION['user']['theme'] === 'light' ?
        'background-color: #f1f1f1; color:#262626' :
        'background-color: #262626; color:#f1f1f1' ?>
    }
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
    .settings, .exit {
        display: flex;
        flex-direction: column;
        margin: 0 auto;
        max-width: 150px;
    }
    .label {
        margin: 0 0 10px 0;
    }
    .btnSubmit {
        margin: 0 0 10px 0;
    }
</style>

<?php

$users = [
    [
        "id" => 1,
        "login" => "admin",
        "password" => password_hash("admin", PASSWORD_BCRYPT),
        "username" => "Администратор",
        "theme" => "light",
    ],
    [
        "id" => 2,
        "login" => "user",
        "password" => password_hash("user", PASSWORD_BCRYPT),
        "username" => "Пользователь",
        "theme" => "light",
    ],
];

file_put_contents("users.json", json_encode($users, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
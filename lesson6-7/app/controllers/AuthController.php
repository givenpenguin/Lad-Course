<?php

namespace App\Controllers;

use App\Auth;
use App\exceptions\CustomException;
use App\Model\User;

class AuthController
{
    private Auth $auth;

    public function __construct()
    {
        $this->auth = new Auth();
    }

    /**
     * @throws CustomException
     */
    public function login(array $post): void
    {
        $login = trim(htmlspecialchars($post['login'] ?? false));
        $password = trim(htmlspecialchars($post['password'] ?? false));

        $user = (new User())->getUserFromDataBase($login);

        if(empty($user))
        {
            header("Location: /pages/login.php");
            throw new CustomException('Пользователя с таким логином не существует');
        }

        if(!$user->verifyPassword($password))
        {
            header("Location: /pages/login.php");
            throw new CustomException('Неверный пароль');
        }

        if(!$this->auth->login($user->getDataArray()))
        {
            header("Location: /pages/login.php");
            throw new CustomException('Не удалось авторизовать пользователя');
        }

        header("Location: /");
        exit();
    }

    public function logout(): void
    {
        session_start();
        $_SESSION = [];
        session_destroy();
        header('Location: /pages/login.php');
        exit();
    }

    /**
     * @throws CustomException
     */
    public function signup(array $post): void
    {
        $username = trim(htmlspecialchars($post['username'] ?? false));
        $login = trim(htmlspecialchars($post['login'] ?? false));
        $password = trim(htmlspecialchars($post['password'] ?? false));
        $passwordConfirm = trim(htmlspecialchars($post['password-conf'] ?? false));

        if($password !== $passwordConfirm)
        {
            header("Location: /pages/signup.php");
            throw new CustomException('Пароли не совпадают');
        }

        $user = (new User())->getUserFromDataBase($login);

        if(!empty($user))
        {
            header("Location: /pages/signup.php");
            throw new CustomException('Такой пользователь уже существует');
        }

        $user = (new User())->setUserToDataBase($username, $login, $password);

        if(empty($user))
        {
            header("Location: /pages/signup.php");
            throw new CustomException('Не удалось записать пользователя');
        }

        if(!$this->auth->login($user->getDataArray()))
        {
            header("Location: /pages/signup.php");
            throw new CustomException('Не удалось авторизовать пользователя');
        }

        header("Location: /");
        exit();
    }
}
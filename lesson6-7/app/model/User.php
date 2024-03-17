<?php

namespace App\Model;

use App\db\JsonDataBase;

class User {
    private int $id;
    private string $login;
    private string $password;
    private string $username;
    private string $theme;

    private JsonDataBase $db;

    public function __construct()
    {
        $this->db = new JsonDataBase('users');
    }

    public function getUserFromDataBase(string $login): User | false
    {
        $user = $this->db->where('login', $login);

        if(!empty($user))
        {
            $this->id = $user['id'];
            $this->login = $user['login'];
            $this->password = $user['password'];
            $this->username = $user['username'];
            $this->theme = $user['theme'];

            return $this;
        }
        return false;
    }

    public function verifyPassword(string $password): bool
    {
        return password_verify($password, $this->password);
    }

    public function setUserToDataBase(string $username, $login, $password): User | false
    {
        $this->id = $this->db->getLastId() + 1;
        $this->login = $login;
        $this->password = password_hash($password, PASSWORD_BCRYPT);
        $this->username = $username;
        $this->theme = 'light';

        return $this->storeUserData('insert');
    }

    public function updateUser(string $key, $value): User | false
    {
        $this->$key = $value;
        $this->db->update($this->getDataArray());
        return $this->storeUserData('update');
    }

    public function storeUserData(string $method): User | false
    {
        if($this->db->$method($this->getDataArray()))
        {
            return $this;
        }
        return false;
    }

    public function getDataArray(): array
    {
        return [
            'id' => $this->id,
            'login' => $this->login,
            'password' => $this->password,
            'username' => $this->username,
            'theme' => $this->theme,
        ];
    }
}

<?php

namespace App\Model;

use App\Auth;

class Theme
{
    private string $login;
    private string $theme;

    public function __construct(string $login, $theme)
    {
        $this->login = $login;
        $this->theme = $theme;
    }

    public function setThemeModeToDataBase(): bool
    {
        $user = (new User())->getUserFromDataBase($this->login);

        if(empty($user))
        {
            return false;
        }

        if(!$user->updateUser('theme', $this->theme))
        {
            return false;
        }

        return true;
    }

    public function setThemeModeToSession(): bool
    {
        $auth = new Auth();
        return $auth->themeMode($this->theme);
    }
}
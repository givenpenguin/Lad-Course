<?php

namespace App;

class Auth
{
    public function login(array $user): bool
    {
        session_start();
        $_SESSION['user'] = $user;
        return session_write_close();
    }

    public function themeMode(string $theme): bool
    {
        session_start();
        $_SESSION['user']['theme'] = $theme;
        return session_write_close();
    }
}
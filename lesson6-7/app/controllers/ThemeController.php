<?php

namespace App\Controllers;

use App\exceptions\CustomException;
use App\Model\Theme;

class ThemeController
{
    /**
     * @throws CustomException
     */
    public function themeMode(array $post): void
    {
        $login = trim(htmlspecialchars($post['login'] ?? false));
        $theme = $post['theme'] ?? false;

        $theme = new Theme($login, $theme);

        if(!$theme->setThemeModeToDataBase())
        {
            header("Location: /");
            throw new CustomException('Не удалось записать тему в БД');
        }

        if(!$theme->setThemeModeToSession())
        {
            header("Location: /");
            throw new CustomException('Не удалось записать тему в сессию');
        }

        header("Location: /");
        exit();
    }
}
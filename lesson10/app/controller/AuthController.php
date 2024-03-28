<?php

namespace App\Controller;

use App\model\User;

class AuthController
{
    public function registration(array $data): void
    {
        $user = new User();
        $user->create($data);

        print_r($user->dataToArray());
    }

    public function authorization()
    {

    }
}
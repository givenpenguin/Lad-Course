<?php

namespace App\model;

class User
{
    private string $email;
    private string $password;
    private string $first_name;
    private string $last_name;

    public function __construct()
    {

    }

    public function create(array $data): self | false
    {
        return $this->extractData($data) ? $this : false;
    }

    public function save(array $data): void
    {

    }

    private function extractData(array $data): bool
    {
        foreach($data as $key => $value)
        {
            $this->{$key} = $value;

            if(!$this->{$key})
            {
                return false;
            }
        }

        return true;
    }

    public function dataToArray(): array
    {
        return [
            'email' => $this->email,
            'password' => $this->password,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
        ];
    }
}
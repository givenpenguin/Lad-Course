<?php

namespace App;

class Request
{
    public function __construct()
    {

    }

    public function formatPath(string $url): string
    {
        return str_contains($url, '?') ? strstr($url, '?', true) : $url;
    }

    public function formatData(string $encodedBody): array
    {
        $data = json_validate($encodedBody) ? json_decode($encodedBody, true) : '';

        foreach($data as &$value)
        {
            $value = trim(htmlspecialchars($value));
        }
        unset($value);

        return $data;
    }

    public function formatGetArgs($url): array
    {
        $args = [];

        if(str_contains($url, '?'))
        {
            $url = substr(strstr($url, '?'), 1);
            parse_str($url, $args);
        }

        return $args;
    }
}
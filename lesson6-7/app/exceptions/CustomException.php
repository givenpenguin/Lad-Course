<?php

namespace App\exceptions;

use Exception;

class CustomException extends Exception
{
    public function __construct($message)
    {
        parent::__construct($message);
    }
}
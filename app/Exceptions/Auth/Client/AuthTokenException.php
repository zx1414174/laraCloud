<?php

namespace App\Exceptions\Auth\Client;

use Exception;

class AuthTokenException extends Exception
{
    public $code = 400;
}

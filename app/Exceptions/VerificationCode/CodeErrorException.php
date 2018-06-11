<?php

namespace App\Exceptions\VerificationCode;

use Exception;

class CodeErrorException extends Exception
{
    protected $code = 400;
    protected $message = 'code error';
}

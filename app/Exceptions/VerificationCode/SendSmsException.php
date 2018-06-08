<?php

namespace App\Exceptions\VerificationCode;

use Exception;

class SendSmsException extends Exception
{
    protected $code = 400;
    protected $message = 'send error';
}

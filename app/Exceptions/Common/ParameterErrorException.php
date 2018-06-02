<?php

namespace App\Exceptions\Common;

use Exception;

class ParameterErrorException extends Exception
{
    protected $code = 500;
    protected $message = 'parameter error';
}

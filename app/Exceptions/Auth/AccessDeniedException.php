<?php

namespace App\Exceptions\Auth;

use Exception;

class AccessDeniedException extends Exception
{
    /**
     * The status code to use for the response.
     *
     * @var int
     */
    protected $code = 403;
    protected $message = 'access denied';
}

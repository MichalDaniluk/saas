<?php

namespace App\Exceptions;

use Exception;
use Throwable;

class NoCompanyUserException extends Exception
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct('_user_not_belong_to_company', $code, $previous);
    }
}

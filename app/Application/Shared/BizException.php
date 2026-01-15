<?php

namespace App\Application\Shared;

use Exception;
use Throwable;

class BizException extends Exception
{
    public function __construct(string $message = "", int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}

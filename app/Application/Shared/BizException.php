<?php

namespace App\Application\Shared;

use Exception;
use Throwable;

class BizException extends Exception
{
    public array $context = [];


    public function __construct(string $message = "", int $code = 0, array $context = [], ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->context = $context;
    }

    public function context(): array
    {
        return $this->context;
    }
}

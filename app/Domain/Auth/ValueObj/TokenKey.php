<?php

namespace App\Domain\Auth\ValueObj;

class TokenKey
{
    public function __construct(
        public string $key
    ) {
    }

    public function interval(): int
    {
        return 86400 * 20;
    }

    public function storeKey(): string
    {
        return "token:{$this->key}";
    }
}

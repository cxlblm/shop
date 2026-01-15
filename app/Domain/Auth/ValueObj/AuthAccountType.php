<?php

namespace App\Domain\Auth\ValueObj;

enum AuthAccountType: int
{
    case Phone = 1;
    case Email = 2;

    public function desc(): string
    {
        return match ($this) {
            self::Phone => 'Phone',
            self::Email => 'Email',
        };
    }
}

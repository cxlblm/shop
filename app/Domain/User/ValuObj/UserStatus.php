<?php

namespace App\Domain\User\ValuObj;

enum UserStatus: int
{
    case Active = 1;
    case Inactive = 2;

    public function desc(): string
    {
        return match ($this) {
            self::Active => 'Active',
            self::Inactive => 'Inactive',
        };
    }
}

<?php

namespace App\Domain\Auth\ValueObj;

enum AuthAccountStatus: int
{
    case Active = 1; // 有效

    case Inactive = 2; // 无效

    public function desc(): string
    {
        return match ($this) {
            self::Active => 'Active',
            self::Inactive => 'Inactive',
        };
    }
}

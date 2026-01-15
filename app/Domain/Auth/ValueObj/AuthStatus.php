<?php

namespace App\Domain\Auth\ValueObj;

enum AuthStatus: int
{
    case Active = 1; // 有效
    case Inactive = 2; // 注销
}

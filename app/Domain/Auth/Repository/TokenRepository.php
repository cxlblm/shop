<?php

namespace App\Domain\Auth\Repository;

use App\Domain\Auth\Token;
use App\Domain\Auth\ValueObj\TokenKey;

interface TokenRepository
{
    public function save(Token $auth): void;

    public function firstByToken(TokenKey $tokenKey): ?Token;
}

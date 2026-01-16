<?php

namespace App\Infra\Repository\Auth;

use App\Domain\Auth\Repository\TokenRepository as DomainTokenRepository;
use App\Domain\Auth\Token;
use App\Domain\Auth\ValueObj\TokenKey;
use Cache;

class TokenRepository implements DomainTokenRepository
{
    public function save(Token $auth): void
    {
        $tokenKey = $auth->tokenKey;
        Cache::put($tokenKey->storeKey(), ['id' => $auth->id, 'uuid' => $auth->uuid], $tokenKey->interval());
    }

    public function firstByToken(TokenKey $tokenKey): ?Token
    {
        $cache = Cache::get($tokenKey->storeKey());
        if (!$cache) {
            return null;
        }
        return new Token($tokenKey, $cache['id'], $cache['uuid']);
    }
}

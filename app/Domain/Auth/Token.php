<?php

namespace App\Domain\Auth;

use App\Domain\Auth\ValueObj\TokenKey;
use Illuminate\Support\Str;

readonly final class Token
{
    public function __construct(
        public TokenKey $tokenKey,
        public int $id,
        public string $uuid,
    ) {
    }

    public static function fromAuth(Auth $auth): self
    {
        return new self(new TokenKey(Str::random(32)), $auth->id, $auth->uuid);
    }
}

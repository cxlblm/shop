<?php

namespace App\Domain\Auth\Service;

use App\Domain\Auth\Repository\TokenRepository;
use App\Domain\Auth\Token;
use App\Domain\Auth\ValueObj\TokenKey;

readonly final class VerifyToken
{
    public function __construct(
        private TokenRepository $tokenRepository
    ) {
    }

    public function __invoke(VerifyTokenCmd $cmd): ?Token
    {
        return $this->tokenRepository->firstByToken(new TokenKey($cmd->token));
    }
}

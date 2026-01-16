<?php

namespace App\Domain\Auth\Service;

use App\Domain\Auth\ValueObj\AuthAccountType;

readonly final class SignInCmd
{
    public function __construct(
        public string $accountId,
        public AuthAccountType $type,
        #[\SensitiveParameter]
        public string $password = '',
    ) {
    }
}

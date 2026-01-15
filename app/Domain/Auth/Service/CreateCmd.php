<?php

namespace App\Domain\Auth\Service;

use App\Domain\Auth\ValueObj\AuthAccountType;

readonly final class CreateCmd
{
    public function __construct(
        public string          $accountId,
        public AuthAccountType $type,
        public string          $password = '',
    ) {
    }
}

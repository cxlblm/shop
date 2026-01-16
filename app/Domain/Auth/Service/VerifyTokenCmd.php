<?php

namespace App\Domain\Auth\Service;

readonly final class VerifyTokenCmd
{
    public function __construct(
        public string $token
    ) {
    }
}

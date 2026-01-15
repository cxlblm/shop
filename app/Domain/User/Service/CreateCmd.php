<?php

namespace App\Domain\User\Service;

readonly final class CreateCmd
{
    public function __construct(
        public string $name,
        public string $authUuid,
    ) {
    }
}

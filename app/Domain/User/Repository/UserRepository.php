<?php

namespace App\Domain\User\Repository;

use App\Domain\User\User;

interface UserRepository
{
    public function save(User $user): void;

    public function firstByAuthUuid(string $authUuid): ?User;
}

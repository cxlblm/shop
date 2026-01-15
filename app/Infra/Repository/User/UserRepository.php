<?php

namespace App\Infra\Repository\User;

use App\Domain\User\Repository\UserRepository as DomainUserRepository;
use App\Domain\User\User;

class UserRepository implements DomainUserRepository
{

    public function save(User $user): void
    {
        $user->save();
    }

    public function firstByAuthUuid(string $authUuid): ?User
    {
        return User::where('auth_uuid', $authUuid)->first();
    }
}

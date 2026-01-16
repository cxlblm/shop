<?php

namespace App\Infra\Repository\Auth;

use App\Domain\Auth\Repository\AuthRepository as DomainUserRepository;
use App\Domain\Auth\Auth;

class AuthRepository implements DomainUserRepository
{
    public function save(Auth $user): void
    {
        $user->save();
    }

    public function firstById(int $id): ?Auth
    {
        return Auth::where('id', $id)
            ->first();
    }
}

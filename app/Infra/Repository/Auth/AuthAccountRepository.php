<?php

namespace App\Infra\Repository\Auth;

use App\Domain\Auth\AuthAccount;
use App\Domain\Auth\Repository\AuthAccountRepository as DomainLoginAccountRepository;
use App\Domain\Auth\ValueObj\AuthAccountType;

class AuthAccountRepository implements DomainLoginAccountRepository
{
    public function save(AuthAccount $loginAccount): void
    {
        $loginAccount->save();
    }

    public function firstByAccountId(string $accountId, AuthAccountType $type): ?AuthAccount
    {
        return AuthAccount::query()
            ->where('account_id', $accountId)
            ->where('type', $type->value)
            ->first();
    }

    public function existsByAccountId(string $accountId, AuthAccountType $type): bool
    {
        return AuthAccount::query()
            ->where('account_id', $accountId)
            ->where('type', $type->value)
            ->exists();
    }
}

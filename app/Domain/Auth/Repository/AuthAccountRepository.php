<?php

namespace App\Domain\Auth\Repository;

use App\Domain\Auth\AuthAccount;
use App\Domain\Auth\ValueObj\AuthAccountType;

interface AuthAccountRepository
{
    public function save(AuthAccount $loginAccount): void;

    public function firstByAccountId(string $accountId, AuthAccountType $type): ?AuthAccount;

    public function existsByAccountId(string $accountId, AuthAccountType $type): bool;
}

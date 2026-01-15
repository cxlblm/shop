<?php

namespace App\Domain\Auth\Service;

use App\Domain\Auth\AuthAccount;
use App\Domain\Auth\Repository\AuthAccountRepository;
use App\Domain\Auth\Repository\AuthRepository;
use App\Domain\Auth\Auth;
use Str;

readonly final class Create
{
    public function __construct(
        private AuthRepository        $userRepository,
        private AuthAccountRepository $loginAccountRepository,
    ) {
    }

    public function __invoke(CreateCmd $cmd): string
    {
        $authAccount = $this->loginAccountRepository->firstByAccountId($cmd->accountId, $cmd->type);
        if ($authAccount) {
            return $authAccount->auth->uuid;
        }

        $auth = new Auth([
            'uuid' => Str::uuid7(),
        ]);

        $auth->setRelation('loginAccounts', $authAccount);
        $this->userRepository->save($auth);
        $authAccount = new AuthAccount([
            'account_id' => $cmd->accountId,
            'password' => $cmd->password,
            'type' => $cmd->type,
            'auth_id' => $auth->id,
        ]);
        $auth->authAccounts()->save($authAccount);
        $this->loginAccountRepository->save($authAccount);
        return $auth->uuid;
    }
}

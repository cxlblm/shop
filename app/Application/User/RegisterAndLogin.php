<?php

namespace App\Application\User;

use App\Domain\Auth\Service\Create as AuthCreate;
use App\Domain\Auth\Service\CreateCmd as AuthCreateCmd;
use App\Domain\User\Service\Create as UserCreate;
use App\Domain\User\Service\CreateCmd as UserCreateCmd;
use App\Domain\Auth\ValueObj\AuthAccountType;

readonly final class RegisterAndLogin
{
    public function __construct(
        private AuthCreate $createAuth,
        private UserCreate $createUser,
    ) {
    }

    public function __invoke(array $params)
    {
        $createAuthCmd = new AuthCreateCmd(...[
            'accountId' => $params['account_id'],
            'type' => AuthAccountType::from($params['type']),
            'password' => $params['password'] ?? '',
        ]);
        $authUuid = ($this->createAuth)($createAuthCmd);

        $createUserCmd = new UserCreateCmd(...[
            'name' => $params['name'],
            'authUuid' => $authUuid,
        ]);
        return ($this->createUser)($createUserCmd);
    }
}

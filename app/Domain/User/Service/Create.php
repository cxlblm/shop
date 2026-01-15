<?php

namespace App\Domain\User\Service;

use App\Domain\User\Repository\UserRepository;
use App\Domain\User\User;
use App\Domain\User\ValuObj\UserStatus;

readonly final class Create
{
    public function __construct(
        private UserRepository $userRepository
    ) {
    }

    public function __invoke(CreateCmd $cmd): string
    {
        $user = $this->userRepository->firstByAuthUuid($cmd->authUuid);

        if ($user) {
            return $user->uuid;
        }

        $user = new User([
            'uuid' => \Str::uuid7(),
            'name' => $cmd->name,
            'auth_uuid' => $cmd->authUuid,
            'status' => UserStatus::Active,
        ]);

        $this->userRepository->save($user);
        return $user->uuid;
    }
}

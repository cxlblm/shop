<?php

namespace App\Domain\Auth\Service;

use App\Application\Shared\BizException;
use App\Domain\Auth\Repository\AuthAccountRepository;
use App\Domain\Auth\Repository\AuthRepository;
use App\Domain\Auth\Token;
use App\Infra\Repository\Auth\TokenRepository;

readonly final class SignIn
{
    public function __construct(
        private AuthAccountRepository $authAccountRepository,
        private AuthRepository $authRepository,
        private TokenRepository       $tokenRepository,
    ) {
    }

    /**
     * @throws \Throwable
     */
    public function __invoke(SignInCmd $cmd): Token
    {
        $authAccount = $this->authAccountRepository->firstByAccountId($cmd->accountId, $cmd->type);
        throw_unless($authAccount, new BizException(message: '用户名或密码错误', context: ['cmd' => $cmd, 'reason' => 'auth account not found']));

        $auth = $this->authRepository->firstById($authAccount->auth_id);
        throw_unless($auth, new BizException('auth not found'));

        $token = Token::fromAuth($auth);
        $this->tokenRepository->save($token);
        return $token;
    }
}

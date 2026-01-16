<?php

namespace App\Http\Controllers;

use App\Domain\Auth\Service\SignIn;
use App\Domain\Auth\Service\SignInCmd;
use App\Domain\Auth\ValueObj\AuthAccountType;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

readonly final class SignInController
{
    public function __construct(private SignIn $signIn)
    {
    }
    public function __invoke(Request $request): JsonResponse
    {
        $params = $request->validate([
            'account_id' => 'required|string',
            'password' => 'required|string',
            'type' => ['required', Rule::enum(AuthAccountType::class)]
        ]);

        $signInCmd = new SignInCmd(...[
            'accountId' => $params['account_id'],
            'password' => $params['password'],
            'type' => AuthAccountType::from($params['type']),
        ]);
        $r = ($this->signIn)($signInCmd);
        return response()->json(['token' => $r->token]);
    }
}

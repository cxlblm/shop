<?php

namespace App\Http\Controllers;

use App\Application\User\RegisterAndLogin;
use App\Domain\Auth\ValueObj\AuthAccountType;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController
{
    public function store(Request $request, RegisterAndLogin $registerAndLogin)
    {
        $params = $request->validate([
            'name' => 'required|string',
            'account_id' => 'required|string',
            'password' => 'nullable|string',
            'type' => ['required', Rule::enum(AuthAccountType::class)],
        ]);

        $uuid = ($registerAndLogin)($params);
        return response()->json(['uuid' => $uuid]);
    }
}

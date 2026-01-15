<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SignInController
{
    public function __construct()
    {
    }

    public function __invoke(Request $request)
    {
        $params = $request->validate([
            'login_id' => 'required|string',
            'password' => 'required|string',
        ]);


    }
}

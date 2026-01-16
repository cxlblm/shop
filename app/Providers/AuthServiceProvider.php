<?php

namespace App\Providers;

use App\Domain\Auth\Service\VerifyToken;
use App\Domain\Auth\Service\VerifyTokenCmd;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->app['auth']->viaRequest('api', function ($request) {
            $token = $request->bearerToken();
            $r = \app(VerifyToken::class)(new VerifyTokenCmd($token));
        });
    }
}

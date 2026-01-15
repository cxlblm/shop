<?php

namespace App\Providers;

use App\Infra\Repository;
use Illuminate\Support\ServiceProvider;
use Laravel\Sanctum\PersonalAccessToken;
use Laravel\Sanctum\Sanctum;
use App\Domain;

class AppServiceProvider extends ServiceProvider
{
    public $singletons = [
        Domain\User\Repository\UserRepository::class => Repository\User\UserRepository::class,
        Domain\Auth\Repository\AuthRepository::class => Repository\Auth\AuthRepository::class,
        Domain\Auth\Repository\AuthAccountRepository::class => Repository\Auth\AuthAccountRepository::class,
    ];

    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Sanctum::usePersonalAccessTokenModel(PersonalAccessToken::class);
    }
}

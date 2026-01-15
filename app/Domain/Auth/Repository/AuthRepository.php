<?php

namespace App\Domain\Auth\Repository;

use App\Domain\Auth\Auth;

interface AuthRepository
{
    public function save(Auth $user): void;
}

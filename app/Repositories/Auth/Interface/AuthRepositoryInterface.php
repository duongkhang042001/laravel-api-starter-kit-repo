<?php

namespace App\Repositories\Auth\Interface;

interface AuthRepositoryInterface
{
    public function register($attributes);
    public function login($attributes);
    public function logout();
}

<?php

namespace App\Http\Controllers\Authenticate;

use App\Abstracts\Http\Controllers\ApiController;
use App\Repositories\Auth\Interface\AuthRepositoryInterface;
use Illuminate\Http\Request;

class AuthController extends ApiController
{
    public function __construct(
        public  AuthRepositoryInterface $repository
    ) {
    }

    public function login(Request $request)
    {
        dd($this->repository);
    }
}

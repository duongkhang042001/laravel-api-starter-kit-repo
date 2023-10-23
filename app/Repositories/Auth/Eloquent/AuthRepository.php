<?php

namespace App\Repositories\Auth\Eloquent;

use App\Abstracts\Repositories\Eloquent\RepositoriesAbstract;
use App\Models\Auth\User as Model;
use App\Repositories\Auth\Interface\AuthRepositoryInterface;
use Illuminate\Container\Container as Application;
use Illuminate\Contracts\Cache\Repository as CacheRepository;


class AuthRepository extends RepositoriesAbstract implements AuthRepositoryInterface
{
    public function __construct(
        Application $app,
        CacheRepository $cache,
    ) {
        parent::__construct($app, $cache);
    }

    public function model()
    {
        return Model::class;
    }


    public function register($attributes)
    {
        //
    }

    public function login($attributes)
    {
        //
    }

    public function logout()
    {
        //
    }

    public function all($filter = [])
    {
        //
    }

    public function create($attributes)
    {
        //
    }

    public function find($id)
    {
        //
    }

    public function update($id, $attributes)
    {
        //
    }

    public function delete($id)
    {
        //
    }
}

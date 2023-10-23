<?php

namespace  App\Abstracts\Repositories\Eloquent;


use Exception;
use Illuminate\Container\Container as Application;
use Illuminate\Contracts\Cache\Repository as CacheRepository;
use App\Abstracts\Models\Model;
use Illuminate\Contracts\Container\BindingResolutionException;
use App\Abstracts\Repositories\Interface\RepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Contracts\Database\Eloquent\Builder;


abstract class RepositoriesAbstract implements RepositoryInterface
{
    protected Application $app;

    protected CacheRepository $cache;

    protected Model $model;

    /**
     * @throws Exception
     */
    public function __construct(Application $app, CacheRepository $cacheRepository)
    {
        $this->app = $app;
        $this->cache = $cacheRepository;
        $this->makeModel();
    }

    /**
     * @throws BindingResolutionException
     */
    public function makeModel(): Model
    {
        $model = $this->app->make($this->model());

        if (!$model instanceof Model) {
            throw new Exception("Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model");
        }

        return $this->model = $model;
    }

    /**
     * @throws BindingResolutionException
     */
    public function resetModel()
    {
        $this->makeModel();
    }
}

<?php

namespace App\Providers;

use App\Repositories\Crud\CrudRepo;
use App\Repositories\Crud\ICrudRepo;
use App\Repositories\TaskRepo\ITaskRepo;
use App\Repositories\TaskRepo\TaskRepo;
use Illuminate\Support\ServiceProvider;

class RepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ICrudRepo::class, CrudRepo::class);
        $this->app->bind(ITaskRepo::class, TaskRepo::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

<?php

namespace App\Providers;

use App\Repositories\Crud\CrudRepo;
use App\Repositories\Crud\ICrudRepo;
use App\Repositories\TaskHistoryRepo\ITaskHistoryRepo;
use App\Repositories\TaskHistoryRepo\TaskHistoryRepo;
use App\Repositories\TaskRepo\ITaskRepo;
use App\Repositories\TaskRepo\TaskRepo;
use Illuminate\Support\ServiceProvider;

class RepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(ICrudRepo::class, CrudRepo::class);
        $this->app->bind(ITaskRepo::class, TaskRepo::class);
        $this->app->bind(ITaskHistoryRepo::class, TaskHistoryRepo::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}

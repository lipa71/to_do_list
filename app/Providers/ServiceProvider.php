<?php

namespace App\Providers;

use App\Services\TaskEmailService\ITaskEmailService;
use App\Services\TaskEmailService\TaskEmailService;
use App\Services\TaskService\ITaskService;
use App\Services\TaskService\TaskService;
use Illuminate\Support\ServiceProvider as MainProvider;

class ServiceProvider extends MainProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(ITaskService::class, TaskService::class);
        $this->app->bind(ITaskEmailService::class, TaskEmailService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}

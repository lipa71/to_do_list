<?php

namespace App\Console\Commands;

use App\Repositories\TaskRepo\ITaskRepo;
use App\Services\TaskService\ITaskService;
use Illuminate\Console\Command;

class TaskNotify extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:task-notify';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send task deadline notification';

    /**
     * Execute the console command.
     */
    public function handle(ITaskService $taskService)
    {

    }
}

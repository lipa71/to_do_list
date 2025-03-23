<?php

namespace App\Console\Commands;

use App\Services\TaskEmailService\ITaskEmailService;
use Illuminate\Console\Command;

class SendTaskDeadlineEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:task-deadline';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send task deadline email notification';

    /**
     * Execute the console command.
     */
    public function handle(ITaskEmailService $taskEmailService)
    {
        $taskEmailService->sendDeadlineEmail();
    }
}

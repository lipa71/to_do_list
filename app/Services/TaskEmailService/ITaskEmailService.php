<?php

namespace App\Services\TaskEmailService;


use App\Models\Tasks\Task;
use Illuminate\Database\Eloquent\Collection;

interface ITaskEmailService
{
    public function getTasksToEmailDeadline(): Collection;

    public function getDataToEmailDeadline(Task $task): array;

    public function sendDeadlineEmail(): void;
}

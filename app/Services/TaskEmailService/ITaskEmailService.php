<?php

namespace App\Services\TaskEmailService;


use App\Models\Task;
use Illuminate\Database\Eloquent\Collection;

interface ITaskEmailService
{
    public function getTasksToEmailDeadline(): Collection;

    public function getDataToEmailDeadline(Task $task): array;

    public function sendDeadlineEmail(): void;
}

<?php

namespace App\Services\TaskEmailService;

use App\Mail\TaskDeadline;
use App\Models\Task;
use App\Repositories\TaskRepo\ITaskRepo;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Mail;

class TaskEmailService implements ITaskEmailService
{
    public function __construct(private ITaskRepo $taskRepo) {}

    public function getTasksToEmailDeadline(): Collection
    {
        return $this->taskRepo->all()->where('deadline', Carbon::tomorrow()->format('Y-m-d'))->get();
    }

    public function getDataToEmailDeadline(Task $task): array
    {
        return [
            'deadline' => $task->deadline,
            'task_name' => $task->name,
            'user_name' => $task->user->name,
            'url' => route('task-show', ['userId' => $task->user_id, 'taskId' => $task->id]),
        ];
    }

    public function sendDeadlineEmail(): void
    {
        $tasks = $this->getTasksToEmailDeadline();

        foreach ($tasks as $task) {
            $userEmail = $task->user ? $task->user->email : null;

            if ($userEmail) {
                $data = $this->getDataToEmailDeadline($task);

                Mail::to($userEmail)->send(new TaskDeadline($data));
            }
        }
    }
}

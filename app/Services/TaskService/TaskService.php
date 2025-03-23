<?php

namespace App\Services\TaskService;

use App\Repositories\TaskRepo\ITaskRepo;
use Illuminate\Support\Facades\URL;

class TaskService implements ITaskService
{
    public function __construct(private ITaskRepo $taskRepo) {}

    public function getForm(): array
    {
        return [
            'id' => null,
            'name' => null,
            'description' => null,
            'priority' => null,
            'state' => null,
            'deadline' => null,
            'user_id' => auth()->user()->id,
        ];
    }

    public function getEditForm(int $taskId): array
    {
        return $this->taskRepo->find($taskId)->toArray();
    }

    public function getValidationRules(): array
    {
        return [
            'form.id'  => 'nullable|numeric',
            'form.name'  => 'required|string|max:255',
            'form.description'  => 'nullable|string|max:500',
            'form.priority'  => 'nullable|numeric',
            'form.state'  => 'nullable|numeric',
            'form.deadline'  => 'required|date',
            'form.user_id'  => 'nullable|numeric',
        ];
    }

    public function getValidationErrorMessages(): array
    {
        return [
            'form.name' => __('Task name is required'),
            'form.deadline'  => __('Task deadline is required'),
        ];
    }

    public function getTaskModalTitle(bool $newTask = true): string
    {
        return __($newTask ? 'Create task' : 'Edit task');
    }

    public function getFilters(): array
    {
        return [
            'priority' => null,
            'state' => null,
            'deadline_from' => null,
            'deadline_to' => null,
        ];
    }

    public function generateShareTaskUrl(int $taskId): string
    {
        return URL::temporarySignedRoute('task-show-signed', now()->addHours(), [
            'userId' => auth()->user()->id,
            'taskId' => $taskId
        ]);
    }

    public function sendDeadlineNotification(): void
    {
        $tasks = $this->taskRepo->getTasksToNotification();

        foreach ($tasks as $task) {
            $userEmail = $task->user ? $task->user->email : null;

            if ($userEmail) {

            }
        }
    }
}

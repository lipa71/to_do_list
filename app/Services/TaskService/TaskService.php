<?php

namespace App\Services\TaskService;


use App\Enums\Tasks\TaskPriorityEnum;
use App\Enums\Tasks\TaskStateEnum;
use App\Repositories\TaskRepo\ITaskRepo;

class TaskService implements ITaskService
{
    public function __construct(private ITaskRepo $taskRepo) {}

    public function getForm(): array
    {
        return [
            'id' => null,
            'name' => null,
            'description' => null,
            'priority' => TaskPriorityEnum::LOW->value,
            'state' => TaskStateEnum::TO_DO->value,
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
            'form.priority'  => 'required|numeric',
            'form.state'  => 'required|numeric',
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
        return __($newTask ? 'Edit task' : 'Create task');
    }
}

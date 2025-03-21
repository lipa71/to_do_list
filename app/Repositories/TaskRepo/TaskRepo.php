<?php

namespace App\Repositories\TaskRepo;

use App\Models\Task;
use App\Repositories\Crud\CrudRepo;
use Illuminate\Database\Eloquent\Collection;

class TaskRepo extends CrudRepo implements ITaskRepo
{
    public function __construct(Task $model)
    {
        parent::__construct($model);
    }

    public function getForm(): array
    {
        return [
            'id' => null,
            'name' => null,
            'description' => null,
            'priority' => null,
            'status' => null,
        ];
    }

    public function getValidationRules(): array
    {
        return [
            'form.id'  => 'nullable|numeric',
            'form.name'  => 'required|string|max:255',
            'form.description'  => 'nullable|string',
            'form.priority'  => 'required|numeric',
            'form.state'  => 'required|numeric',
            'form.deadline'  => 'required|date',
        ];
    }

    public function getValidationErrorMessages(): array
    {
        return [
            'form.name' => 'Task name is required',
            'form.deadline'  => 'Task deadline is required',
        ];
    }
}

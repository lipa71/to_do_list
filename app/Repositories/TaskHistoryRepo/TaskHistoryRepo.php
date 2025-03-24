<?php

namespace App\Repositories\TaskHistoryRepo;

use App\Enums\Tasks\TaskPriorityEnum;
use App\Enums\Tasks\TaskStateEnum;
use App\Models\Tasks\Task;
use App\Models\Tasks\TaskHistory;
use App\Repositories\Crud\CrudRepo;
use App\Repositories\TaskRepo\ITaskRepo;
use Illuminate\Database\Eloquent\Builder;

class TaskHistoryRepo extends CrudRepo implements ITaskHistoryRepo
{
    public function __construct(TaskHistory $model)
    {
        parent::__construct($model);
    }

    public function getTaskName(int $taskId): string
    {
        return $this->taskRepo->find($taskId)->name;
    }

    public function getTaskHistoryList(int $taskId): Builder {
        $taskHistoryList = $this->all()->where('task_id', $taskId);
        $this->applySorting($taskHistoryList);

        return $taskHistoryList;
    }

    public function saveTaskHistory(Task $taskModel, array $form): void
    {
        $taskId = $form['id'];
        $form = $this->removeEditFields($form);

        foreach ($form as $field => $value) {
            if ($value != $taskModel->$field) {

                if ($field == 'priority') {
                    $oldValue = TaskPriorityEnum::description($taskModel->$field);
                    $newValue = TaskPriorityEnum::description($value);
                } elseif ($field == 'state') {
                    $oldValue = TaskStateEnum::description($taskModel->$field);
                    $newValue = TaskStateEnum::description($value);
                } else {
                    $oldValue = $taskModel->$field;
                    $newValue = $value;
                }

                $this->create([
                    'task_id' => $taskId,
                    'column_name' => ucfirst($field),
                    'old_value' => $oldValue,
                    'new_value' => $newValue,
                ]);
            }
        }
    }
}


<?php

namespace App\Repositories\TaskRepo;

use App\Models\Tasks\Task;
use App\Repositories\Crud\CrudRepo;
use App\Repositories\TaskHistoryRepo\ITaskHistoryRepo;
use Illuminate\Database\Eloquent\Builder;

class TaskRepo extends CrudRepo implements ITaskRepo
{
    public function __construct(Task $model)
    {
        parent::__construct($model);
    }

    public function saveTask(array $form): void
    {
        if ($form['id']) {
            $id = $form['id'];

            $valuesToSave = $this->removeEditFields($form);

            $this->update($this->find($id), $valuesToSave);
        }
        else {
            $this->create($form);
        }
    }

    public function getTaskList(int $userId = 0, array $filters = [], array $attributes = []): Builder
    {
        $taskList = $this->all();

        if ($userId) {
            $taskList->where('user_id', $userId);
        }

        foreach ($filters as $field => $value) {
            if ($value) {
                if ($field == 'deadline_from') {
                    $taskList->where('deadline', '>=', $value);
                }
                elseif ($field == 'deadline_to') {
                    $taskList->where('deadline', '<=', $value);
                }
                else {
                    $taskList->where($field, $value);
                }
            }
        }

        $this->applySorting($taskList, $attributes);

        return $taskList;
    }
}

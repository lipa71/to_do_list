<?php

namespace App\Repositories\TaskRepo;

use App\Models\Task;
use App\Repositories\Crud\CrudRepo;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

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

            $remove = ['id', 'created_at', 'updated_at', 'deleted_at'];
            $valuesToSave = array_diff_key($form, array_flip($remove));

            $this->update($this->find($id), $valuesToSave);
        }
        else {
            $this->create($form);
        }
    }

    public function getTaskList(int $userId = 0, array $filters = [], array $attributes = []): LengthAwarePaginator
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
        $taskList = $this->paginate($taskList);

        return $taskList;
    }

    public function getTasksToNotification(): Collection
    {
        return $this->all()->where('deadline', Carbon::tomorrow()->format('Y-m-d'));
    }
}

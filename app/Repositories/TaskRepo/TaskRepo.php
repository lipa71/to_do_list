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
}

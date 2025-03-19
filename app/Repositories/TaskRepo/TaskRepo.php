<?php

namespace App\Repositories\TaskRepo;

use App\Models\Task;
use App\Repositories\Crud\CrudRepo;

class TaskRepo extends CrudRepo implements ITaskRepo
{
    public function __construct(Task $model)
    {
        parent::__construct($model);
    }
}

<?php

namespace App\Repositories\TaskRepo;

use App\Repositories\Crud\ICrudRepo;
use Illuminate\Database\Eloquent\Collection;

interface ITaskRepo extends ICrudRepo {
    public function saveTask(array $form): void;
}

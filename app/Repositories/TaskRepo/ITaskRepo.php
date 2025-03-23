<?php

namespace App\Repositories\TaskRepo;

use App\Repositories\Crud\ICrudRepo;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface ITaskRepo extends ICrudRepo {
    public function saveTask(array $form): void;

    public function getTaskList(int $userId = 0, array $filters = [], array $attributes = []): LengthAwarePaginator;

    public function getTasksToNotification(): Collection;
}

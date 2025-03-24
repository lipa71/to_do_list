<?php

namespace App\Repositories\TaskHistoryRepo;

use App\Models\Tasks\Task;
use App\Repositories\Crud\ICrudRepo;
use Illuminate\Database\Eloquent\Builder;

interface ITaskHistoryRepo extends ICrudRepo {
    public function getTaskName(int $taskId): string;

    public function getTaskHistoryList(int $taskId): Builder;

    public function saveTaskHistory(Task $taskModel, array $form): void;
}

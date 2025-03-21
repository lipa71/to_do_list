<?php

namespace App\Repositories\TaskRepo;

use App\Repositories\Crud\ICrudRepo;
use Illuminate\Database\Eloquent\Collection;

interface ITaskRepo extends ICrudRepo {
    public function getForm(): array;

    public function getValidationRules(): array;

    public function getValidationErrorMessages(): array;
}

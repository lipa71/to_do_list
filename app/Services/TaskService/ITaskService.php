<?php

namespace App\Services\TaskService;


interface ITaskService
{
    public function getForm(): array;

    public function getValidationRules(): array;

    public function getValidationErrorMessages(): array;

    public function getTaskModalTitle(bool $newTask = true): string;
}

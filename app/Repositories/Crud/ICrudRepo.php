<?php

namespace App\Repositories\Crud;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

interface ICrudRepo
{
    public function find($id): ?Model;

    public function all(): Builder;

    public function create(array $attributes): Model;

    public function update(Model $model, array $attributes): Model;

    public function delete(Model $model);

    public function removeEditFields(array $form): array;
}

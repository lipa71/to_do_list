<?php

namespace App\Repositories\Crud;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface ICrudRepo
{
    public function find($id): ?Model;

    public function all(array $attributes = [], array $values = []): LengthAwarePaginator;

    public function paginate(Builder $query, array $attributes = []): LengthAwarePaginator;

    public function create(array $attributes): Model;

    public function update(Model $model, array $attributes): Model;

    public function delete(Model $model);

    public function restore(Model $model);

    public function forceDelete(Model $model);

    public function deleteId($id);

    public function updateOrCreateBase($id, $data);
}

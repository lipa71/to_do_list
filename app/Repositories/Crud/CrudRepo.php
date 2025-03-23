<?php

namespace App\Repositories\Crud;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

class CrudRepo implements ICrudRepo
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function find($id): ?Model
    {
        return $this->model->find($id);
    }

    public function all(): Builder
    {
        return $this->model->query();
    }

    public function paginate(Builder $query, array $attributes = []): LengthAwarePaginator
    {
        $query->orderBy(($attributes['order_by'] ?? 'id'), ($attributes['order_by_direction'] ?? 'desc'));

        return $query->paginate($attributes['paginate'] ?? 20);
    }

    public function create(array $attributes): Model
    {
        if (isset($attributes['id'])) {
            unset($attributes['id']);
        }

        $attributes['user_id'] = auth()->id();

        return $this->model->create($attributes);
    }

    public function update(Model $model, array $attributes): Model
    {
        $model->update($attributes);

        return $model;
    }

    public function delete(Model $model)
    {
        $model->delete();
    }

    protected function applySorting(&$query, array $attributes): void
    {
        $columns = (array) ($attributes['order_by'] ?? 'id');
        $directions = (array) ($attributes['order_by_direction'] ?? 'desc');

        foreach ($columns as $index => $column) {
            $query->orderBy($column, $directions[$index] ?? 'desc');
        }
    }
}

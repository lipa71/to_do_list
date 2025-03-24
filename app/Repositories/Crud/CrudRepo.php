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

    public function removeEditFields(array $form): array
    {
        $remove = ['id', 'created_at', 'updated_at', 'deleted_at', 'user_id'];

        return array_diff_key($form, array_flip($remove));
    }

    protected function applySorting(Builder $query, array $attributes = []): void
    {
        $columns = (array) ($attributes['order_by'] ?? 'id');
        $directions = (array) ($attributes['order_by_direction'] ?? 'desc');

        foreach ($columns as $index => $column) {
            $query->orderBy($column, $directions[$index] ?? 'desc');
        }
    }
}

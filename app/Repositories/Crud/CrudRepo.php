<?php

namespace App\Repositories\Crud;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class CrudRepo implements ICrudRepo
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function find($id): ?Model
    {
        if (in_array(SoftDeletes::class, class_uses($this->model))) {
            return $this->model->withTrashed()->find($id);
        }

        return $this->model->find($id);
    }

    public function all(array $attributes = [], array $values = []): LengthAwarePaginator
    {
        $query = $this->model->query();
        $this->applySorting($query, $attributes);
        $query = $this->paginate($query);

        return $query;
    }

    public function paginate(Builder $query, array $attributes = []): LengthAwarePaginator
    {
        $query->orderBy(($attributes['order_by'] ?? 'id'), ($attributes['order_by_direction'] ?? 'desc'));

        return $query->paginate($attributes['paginate'] ?? 20);
    }

    public function create(array $attributes): Model
    {
        if (isset($attributes['id']))
        {
            unset($attributes['id']);
        }

        return $this->model->create($attributes);
    }

    public function update(Model $model, array $attributes, array $files = []): Model
    {
        if (auth()->check() && ! isset($attributes['updated_user_id'])) {
            $attributes['updated_user_id'] = auth()->id();
        }

        $model->update($attributes);

        return $model;
    }

    public function delete(Model $model)
    {
        $model->delete();
    }

    public function restore(Model $model)
    {
        $model->restore();
    }

    public function forceDelete(Model $model)
    {
        $model->forceDelete();
    }

    public function deleteId($id)
    {
        $this->model->where('id', $id)->delete();
    }

    public function updateOrCreateBase($id, $data): Model
    {
        return $this->model->updateOrCreate(
            ['id' => $id],
            $data
        );
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

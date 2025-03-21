<?php

namespace App\Livewire\Traits;

trait WithSorting
{
    public $sorts = [];

    public $filter = [];

    public function sortBy($field, $direction = null, $clearOther = false)
    {
        if ($clearOther === true) {
            $this->sorts = [];
        }

        if ($direction != null) {
            $this->sorts[$field] = $direction;

            return true;
        }

        if (! isset($this->sorts[$field])) {
            $this->sorts[$field] = 'asc';
        } elseif ($this->sorts[$field] === 'asc') {
            $this->sorts[$field] = 'desc';
        } else {
            unset($this->sorts[$field]);
        }

        if (count($this->sorts) > 1) {
            foreach ($this->sorts as $key => $value) {
                if ($key != $field) {
                    unset($this->sorts[$key]);
                }
            }
        }
    }

    public function applySorting($query)
    {
        foreach ($this->sorts as $field => $direction) {
            $query->orderBy($field, $direction);
        }

        return $query;
    }

    public function mountWithSorting()
    {
        $this->fill(request()->only('filter'));
        $filter = request()->only('filter');

        if ($filter && isset($filter['filter'])) {
            foreach ($filter['filter'] as $key => $val) {
                if (array_key_exists($key, $this->arrayFilters)) {
                    $this->arrayFilters[$key] = explode(',', $val);
                }
            }
        }

        if (isset($this->uuid) && $this->uuid != '') {
            $this->arrayFilters['finished'] = 0;
        } elseif (! isset($filter['filter']['finished'])) {
            $this->arrayFilters['finished'] = '2';
        }
    }

    public function updatingFilter()
    {
        $this->resetPage();
    }

    public function updatingArrayFilters($value, $name)
    {
        $this->syncWithFilter($name, $value);
    }

    public function syncWithFilter($key, $array)
    {
        if (is_countable($array)) {
            $this->filter[$key] = count($array) ? collect($array)->join(',') : null;
        } else {
            $this->filter[$key] = $array ? $array : null;
        }
    }

    public function updatedFilter($value, $name)
    {
        if ($value === false) {
            $this->filter[$name->__toString()] = null;
        }
    }
}

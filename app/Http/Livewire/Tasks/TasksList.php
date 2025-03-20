<?php

namespace App\Http\Livewire\Tasks;

use App\Http\Livewire\Traits\InteractsWithModal;
use App\Http\Livewire\Traits\WithSorting;
use Livewire\Component;
use Livewire\WithPagination;

class TasksList extends Component
{
    use InteractsWithModal;
    use WithPagination;
    use WithSorting;

    public function render()
    {
        return view('livewire.tasks.tasks-list');
    }

    public function mount()
    {

    }
}

<?php

namespace App\Livewire\Tasks;

use App\Enums\Tasks\TaskPriorityEnum;
use App\Enums\Tasks\TaskStatesEnum;
use App\Livewire\Traits\WithSorting;
use App\Models\Task;
use Livewire\Component;
use Livewire\WithPagination;

class TasksList extends Component
{
    use WithPagination;
    use WithSorting;

    public $arrayFilters = [];
    public $form = [
        'name' => '',
        'description' => '',
        'priority' => null,
        'status' => null,
    ];

    protected function rules()
    {
        $rules = [

        ];
    }

    public ?Task $taskModel = null;

    public $availableTaskPriorites = [];

    public $availableTaskStates = [];

    public $modalTitle = 'Create Task';

    public function render()
    {
        return view('livewire.tasks.tasks-list');
    }

    public function mount()
    {
        $this->availableTaskPriorites = TaskPriorityEnum::getArray();
        $this->availableTaskStates = TaskStatesEnum::getArray();
    }

    public function createTask(): void
    {

    }
}

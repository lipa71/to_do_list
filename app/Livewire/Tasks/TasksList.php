<?php

namespace App\Livewire\Tasks;

use App\Enums\Tasks\TaskPriorityEnum;
use App\Enums\Tasks\TaskStatesEnum;
use App\Livewire\Traits\WithSorting;
use App\Models\Task;
use App\Repositories\TaskRepo\ITaskRepo;
use Livewire\Component;
use Livewire\WithPagination;

class TasksList extends Component
{
    use WithPagination;
    use WithSorting;

    public $form = [];

    public $arrayFilters = [];

    private ITaskRepo $taskRepo;

    public function boot(ITaskRepo $taskRepo): void
    {
        $this->taskRepo = $taskRepo;
    }

    public ?Task $taskModel = null;

    public $availableTaskPriorites = [];

    public $availableTaskStates = [];

    public $modalTitle = 'Create Task';

    public function render()
    {
        $tasks = $this->taskRepo->all(['user_id' => auth()->id()]);

        return view('livewire.tasks.tasks-list', ['tasks' => $tasks]);
    }

    public function mount()
    {
        $this->form = $this->taskRepo->getForm();

        $this->availableTaskPriorites = TaskPriorityEnum::getArray();
        $this->availableTaskStates = TaskStatesEnum::getArray();
    }

    public function openCreateModal(): void
    {
        $this->modalTitle = 'Create Task';

        $this->form['priority'] = $this->availableTaskPriorites[0]['value'];
        $this->form['state'] = $this->availableTaskStates[0]['value'];
    }

    public function createTask(): void
    {
        $this->form = $this->validate($this->taskRepo->getValidationRules(), $this->taskRepo->getValidationErrorMessages());
        $this->taskRepo->create($this->form);
    }
}

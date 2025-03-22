<?php

namespace App\Livewire\Tasks;

use App\Enums\Tasks\TaskPriorityEnum;
use App\Enums\Tasks\TaskStateEnum;
use App\Livewire\Traits\WithSorting;
use App\Repositories\TaskRepo\ITaskRepo;
use App\Services\TaskService\ITaskService;
use Livewire\Component;
use Livewire\WithPagination;

class TasksList extends Component
{
    use WithPagination;
    use WithSorting;

    public $form = [];

    public $arrayFilters = [];

    private ITaskRepo $taskRepo;

    private ITaskService $taskService;

    public function boot(ITaskRepo $taskRepo, ITaskService $taskService): void
    {
        $this->taskRepo = $taskRepo;
        $this->taskService = $taskService;
    }

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
        $this->form = $this->taskService->getForm();

        $this->availableTaskPriorites = TaskPriorityEnum::getArray();
        $this->availableTaskStates = TaskStateEnum::getArray();
    }

    public function createTask(): void
    {
        $this->validate($this->taskService->getValidationRules(), $this->taskService->getValidationErrorMessages());
        $this->taskRepo->create($this->form);

        $this->dispatch('toast', 'Task Created');
        $this->dispatch('closeTaskModal');

        $this->form = $this->taskService->getForm();
    }

    public function deleteTask(int $taskId): void
    {
        $this->taskRepo->delete($this->taskRepo->find($taskId));
    }

    public function editTask(int $taskId): void
    {
        $this->form = $this->taskService->getEditForm($taskId);
    }
}

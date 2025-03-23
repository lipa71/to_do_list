<?php

namespace App\Livewire\Tasks;

use App\Enums\Tasks\TaskPriorityEnum;
use App\Enums\Tasks\TaskStateEnum;
use App\Repositories\TaskRepo\ITaskRepo;
use App\Services\TaskService\ITaskService;
use Livewire\Component;
use Livewire\WithPagination;

class TasksList extends Component
{
    use WithPagination;

    public $form = [];

    public $filters = [];

    private ITaskRepo $taskRepo;

    private ITaskService $taskService;

    public function boot(ITaskRepo $taskRepo, ITaskService $taskService): void
    {
        $this->taskRepo = $taskRepo;
        $this->taskService = $taskService;
    }

    public $availableTaskPriorites = [];

    public $availableTaskStates = [];

    public $modalTitle = '';

    public $shareTaskUrl = '';

    public function render()
    {
        $tasks = $this->taskRepo->getTaskList(auth()->id(), $this->filters);
        $tasks = $tasks->paginate(20);

        return view('livewire.tasks.tasks-list', ['tasks' => $tasks]);
    }

    public function mount()
    {
        $this->form = $this->taskService->getForm();
        $this->filters = $this->taskService->getFilters();
        $this->availableTaskPriorites = TaskPriorityEnum::getArray();
        $this->availableTaskStates = TaskStateEnum::getArray();
    }

    public function saveTask(): void
    {
        $this->validate($this->taskService->getValidationRules(), $this->taskService->getValidationErrorMessages());
        $this->taskRepo->saveTask($this->form);

        session()->flash('success', 'Changes has been saved successfully.');
        $this->dispatch('removeFlashMessage');
        $this->dispatch('closeTaskModal');

        $this->form = $this->taskService->getForm();
    }

    public function deleteTask(int $taskId): void
    {
        $this->taskRepo->delete($this->taskRepo->find($taskId));
    }

    public function openCreateTask(): void
    {
        $this->modalTitle = $this->taskService->getTaskModalTitle();
        $this->form = $this->taskService->getForm();
    }

    public function openEditTask(int $taskId): void
    {
        $this->modalTitle = $this->taskService->getTaskModalTitle(false);
        $this->form = $this->taskService->getEditForm($taskId);
    }

    public function shareTask(int $taskId): void
    {
        $this->shareTaskUrl = $this->taskService->generateShareTaskUrl($taskId);
    }
}

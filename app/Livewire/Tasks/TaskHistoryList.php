<?php

namespace App\Livewire\Tasks;

use App\Repositories\TaskHistoryRepo\ITaskHistoryRepo;
use App\Repositories\TaskRepo\ITaskRepo;
use Livewire\Component;

class TaskHistoryList extends Component
{
    public $taskId = null;

    public $userId = null;

    public $taskName = null;

    private ITaskHistoryRepo $taskHistoryRepo;

    private ITaskRepo $taskRepo;

    public function boot(ITaskHistoryRepo $taskHistoryRepo, ITaskRepo $taskRepo): void
    {
        $this->taskHistoryRepo = $taskHistoryRepo;
        $this->taskRepo = $taskRepo;
    }

    public function render()
    {
        $taskHistoryList = $this->taskHistoryRepo->getTaskHistoryList($this->taskId);
        $taskHistoryList = $taskHistoryList->paginate(20);

        return view('livewire.tasks.task-history-list', ['taskHistoryList' => $taskHistoryList]);
    }

    public function mount()
    {
        if (auth()->user() && auth()->user()->id != $this->userId) {
            return redirect('/dashboard');
        }

        $this->taskName = $this->taskRepo->find($this->taskId)->name;
    }
}

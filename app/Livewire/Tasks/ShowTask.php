<?php

namespace App\Livewire\Tasks;

use App\Repositories\TaskRepo\ITaskRepo;
use Livewire\Component;

class ShowTask extends Component
{
    public $taskId = null;
    public $userId = null;

    public $taskModel = null;

    private ITaskRepo $taskRepo;

    public function boot(ITaskRepo $taskRepo): void
    {
        $this->taskRepo = $taskRepo;
    }

    public function render()
    {
        return view('livewire.tasks.show-task');
    }

    public function mount()
    {
        if (auth()->user() && auth()->user()->id != $this->userId) {
            return redirect('/dashboard');
        }

        $this->taskModel = $this->taskRepo->find($this->taskId);
    }
}

<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class Modal extends Component
{
    public $isOpen = false;

    public $opacity = 0;

    public $type = '';

    public $params = [];

    public $modalSize = '';

    public $fullHeight = 0;

    protected $listeners = ['showModal' => 'open', 'closeModal' => 'close'];

    public function open($type, $params, $modalSize = null, $force = false)
    {
        $this->isOpen = true;
        $this->type = $type;
        $this->params = $params;
        if ($modalSize) { // modal-xl
            $this->modalSize = $modalSize;
        }

        if (str_contains($this->modalSize, '-full-height')) {
            $this->modalSize = str_replace('-full-height', '', $this->modalSize);
            $this->fullHeight = 1;
        }

        if ($force) {
            $this->emit('jsModalOpen');
        }
    }

    public function close()
    {
        $this->emit('jsModalClose');
        $this->isOpen = false;
        $this->modalSize = '';
    }

    public function render()
    {
        return view('livewire.components.modal');
    }
}

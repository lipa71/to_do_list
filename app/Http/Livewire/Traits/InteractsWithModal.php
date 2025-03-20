<?php

namespace App\Http\Livewire\Traits;

trait InteractsWithModal
{
    protected function openModal($form, $params = [], $modalSize = null, $force = false)
    {
        $this->emitTo('components.modal', 'showModal', $form, $params, $modalSize, $force);
    }

    protected function closeModal()
    {
        $this->emitTo('components.modal', 'closeModal');
    }
}

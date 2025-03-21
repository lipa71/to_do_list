<div>
    <button
        type="button" wire:click="openCreateModal" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#taskModal">
        {{__('Create task')}}
    </button>

   @include('livewire.tasks.task-modal')
</div>

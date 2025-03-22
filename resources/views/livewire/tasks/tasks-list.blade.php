<div>
    <button
        type="button" wire:click="openCreateModal" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#taskModal">
        {{__('Create task')}}
    </button>

    <div class="h-full">
        <div class="flex-col space-y-4">
            <x-table.table class="overflow-x-scroll">
                <x-slot name="head">
                        <x-table.heading>ID</x-table.heading>
                </x-slot>
                <x-slot name="body">
                    @forelse ($tasks as $task)
                        <x-table.row>
                            <x-table.cell>
                                {{ $task->id }}
                            </x-table.cell>
                        </x-table.row>
                    @empty
                        <x-table.row>
                            <x-table.cell colspan="1">
                                <div class="flex justify-center items-center space-x-2">
                                    <span class="font-medium py-8 text-cool-gray-400 text-xl">{{ __('No tasks') }}</span>
                                </div>
                            </x-table.cell>
                        </x-table.row>
                    @endforelse
                </x-slot>
            </x-table.table>
        </div>
    </div>


   @include('livewire.tasks.task-modal')
</div>

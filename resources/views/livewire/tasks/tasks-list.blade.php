<div>
    <div>
        @if(session(('success')))
            <div>
                Success alert
            </div>
        @endif
    </div>

    <button
        type="button" class="btn btn-primary" data-bs-toggle="modal"
        data-bs-target="#taskModal">
        {{__('Create task')}}
    </button>

    <div class="h-full mt-6">
        <div class="flex-col space-y-4">
            <x-table.table class="overflow-x-scroll">
                <x-slot name="head">
                    <x-table.heading>ID</x-table.heading>
                    <x-table.heading>{{__('Name')}}</x-table.heading>
                    <x-table.heading>{{__('Description')}}</x-table.heading>
                    <x-table.heading>{{__('Priority')}}</x-table.heading>
                    <x-table.heading>{{__('State')}}</x-table.heading>
                    <x-table.heading>{{__('Deadline')}}</x-table.heading>
                    <x-table.heading></x-table.heading>
                </x-slot>
                <x-slot name="body">
                    @forelse ($tasks as $task)
                        <x-table.row wire:key="task-{{$task->id}}">
                            <x-table.cell>
                                {{ $task->id }}
                            </x-table.cell>
                            <x-table.cell>
                                {{ $task->name }}
                            </x-table.cell>
                            <x-table.cell>
                                <div class="text-break">
                                    {{ $task->description }}
                                </div>
                            </x-table.cell>
                            <x-table.cell>
                                {{ $task->priorityDescription() }}
                            </x-table.cell>
                            <x-table.cell>
                                {{ $task->stateDescription() }}
                            </x-table.cell>
                            <x-table.cell>
                                {{ $task->deadline }}
                            </x-table.cell>
                            <x-table.cell>
                                <div class="flex gap-2">
                                    <button wire:click.prevent="edit({{ $task->id }})"
                                            data-toggle="modal" data-target="#traitModal"
                                            class="btn btn-sm btn-primary">
                                        {{ __('Edit') }}
                                    </button>
                                    <button wire:click.prevent="deleteTask({{ $task->id }})"
                                            onclick="confirm('Are you sure you want to delete this task?') || event.stopImmediatePropagation()"
                                            class="btn btn-sm btn-danger">
                                        {{ __('Delete') }}
                                    </button>
                                </div>
                            </x-table.cell>
                        </x-table.row>
                    @empty
                        <x-table.row>
                            <x-table.cell colspan="6">
                                <div class="flex justify-center items-center space-x-2">
                                    <span
                                        class="font-medium py-8 text-cool-gray-400 text-xl">{{ __('No tasks') }}</span>
                                </div>
                            </x-table.cell>
                        </x-table.row>
                    @endforelse
                </x-slot>
            </x-table.table>
            <div>
                {{ $tasks->links() }}
            </div>
        </div>
    </div>


    @include('livewire.tasks.task-modal')
</div>

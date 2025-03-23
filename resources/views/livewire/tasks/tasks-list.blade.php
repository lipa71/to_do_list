<div>
    <div class="container">
        <div class="row">
            <div class="col-10">
                <div class="flex gap-2">
                    <div>
                        <x-input-label for="filters.priority" :value="__('Priority')"/>
                        <x-select wire:change="$refresh" :options="$availableTaskPriorites" wire:model="filters.priority" id="filters.priority" name="filters.priority" class="mt-1 block w-full"/>
                    </div>
                    <div>
                        <x-input-label for="filters.priority" :value="__('State')"/>
                        <x-select wire:change="$refresh" :options="$availableTaskStates" wire:model="filters.state" id="filters.state" name="filters.state" class="mt-1 block w-full"/>
                    </div>
                    <div>
                        <x-input-label for="filters.deadline_from" :value="__('Deadline from')"/>
                        <x-input-date wire:change="$refresh" wire:model="filters.deadline_from" id="filters.deadline_from" name="filters.deadline_from" class="mt-1 block w-full"/>
                    </div>
                    <div>
                        <x-input-label for="filters.deadline_to" :value="__('Deadline to')"/>
                        <x-input-date wire:change="$refresh" wire:model="filters.deadline_to" id="filters.deadline_to" name="filters.deadline_to" class="mt-1 block w-full"/>                    </div>
                </div>
            </div>
            <div class="col">
                <div class="flex justify-end">
                    <button wire:click.prevent="openCreateTask"
                            type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#taskModal">
                        {{__('Create task')}}
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="h-full mt-6">
        <div class="flex-col space-y-4">
            <x-table.table class="overflow-x-auto">
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
                                <div class="text-nowrap">
                                    {{ $task->id }}
                                </div>
                            </x-table.cell>
                            <x-table.cell>
                                <div class="text-break">
                                    {{ $task->name }}
                                </div>
                            </x-table.cell>
                            <x-table.cell>
                                <div class="text-break">
                                    {{ $task->description }}
                                </div>
                            </x-table.cell>
                            <x-table.cell>
                                <div class="text-nowrap">
                                    {{ $task->priorityDescription() }}
                                </div>
                            </x-table.cell>
                            <x-table.cell>
                                <div class="text-nowrap">
                                    {{ $task->stateDescription() }}
                                </div>
                            </x-table.cell>
                            <x-table.cell>
                                <div class="text-nowrap">
                                    {{ $task->deadline }}
                                </div>
                            </x-table.cell>
                            <x-table.cell>
                                <div class="flex justify-center">
                                    <div class="btn-group">
                                        <a href="{{route('task-show', ['userId' => auth()->user()->id, 'taskId' => $task->id])}}" target="_blank" type="button" class="btn btn-sm btn-primary">{{__('Show')}}</a>
                                        <button type="button" class="btn btn-sm btn-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false"></button>
                                        <ul class="dropdown-menu">
                                            <li><button wire:click.prevent="openEditTask({{ $task->id }})" data-bs-toggle="modal" data-bs-target="#taskModal"
                                                        class="dropdown-item" >{{__('Edit')}}</button></li>
                                            <li><button wire:click.prevent="shareTask({{ $task->id }})" data-bs-toggle="modal" data-bs-target="#taskModalShare"
                                                        class="dropdown-item" >{{__('Share')}}</button></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><button wire:click.prevent="deleteTask({{ $task->id }})"
                                                        onclick="confirm('Are you sure you want to delete this task?') || event.stopImmediatePropagation()"
                                                        class="dropdown-item" >{{__('Delete')}}</button></li>
                                        </ul>
                                    </div>
                                </div>
                            </x-table.cell>
                        </x-table.row>
                    @empty
                        <x-table.row>
                            <x-table.cell colspan="100%">
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
    @include('livewire.tasks.task-share-modal')
</div>

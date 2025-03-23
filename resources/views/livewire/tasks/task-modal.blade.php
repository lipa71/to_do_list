<div wire:ignore.self class="modal fade" id="taskModal" tabindex="-1" aria-labelledby="taskModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-gray-800">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="taskModalLabel">{{$modalTitle}}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div>
                    <x-input-label for="form.name" :value="__('Name')" />
                    <x-text-input wire:model.defer="form.name" id="form.name" name="form.name" class="mt-1 block w-full"/>
                    <x-input-error :messages="$errors->get('form.name')" class="mt-2" />
                </div>
                <div class="mt-2">
                    <x-input-label for="form.description" :value="__('Description')" />
                    <x-textarea wire:model.defer="form.description" id="form.description" name="form.description" class="mt-1 block w-full"/>
                </div>
                <div class="mt-2">
                    <x-input-label for="form.priority" :value="__('Priority')" />
                    <x-select :options="$availableTaskPriorites" wire:model.defer="form.priority" id="form.priority" name="form.priority" class="mt-1 block w-full"/>
                </div>
                <div class="mt-2">
                    <x-input-label for="form.state" :value="__('State')" />
                    <x-select :options="$availableTaskStates" wire:model.defer="form.state" id="form.state" name="form.state" class="mt-1 block w-full"/>
                </div>
                <div class="mt-2">
                    <x-input-label for="form.deadline" :value="__('Deadline')" />
                    <x-input-date wire:model.defer="form.deadline" id="form.deadline" name="form.deadline" class="mt-1 block w-full"/>
                    <x-input-error :messages="$errors->get('form.deadline')" class="mt-2" />
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('Close')}}</button>
                <button type="button" wire:click="saveTask('{{$form['id']}}')" class="btn btn-primary">{{__('Save changes')}}</button>
            </div>
        </div>
    </div>

    @script
        <script>
            $wire.on('closeTaskModal', () => {
                $('#taskModal').modal('hide');
            });
        </script>
    @endscript
</div>

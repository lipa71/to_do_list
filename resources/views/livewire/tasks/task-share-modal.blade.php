<div wire:ignore.self class="modal modal-xl fade" id="taskModalShare" tabindex="-1" aria-labelledby="taskModalShareLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content bg-gray-800">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="taskModalLabel">{{__('Share Task')}}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-6">
                    {{__('This is outside link to share your task. Link will be active for 1 hour from now.')}}
                </div>
                {{$shareTaskUrl}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('Close')}}</button>
            </div>
        </div>
    </div>

    @script
    <script>
        $wire.on('closeTaskShareModal', () => {
            $('#taskModalShare').modal('hide');
        });
    </script>
    @endscript
</div>

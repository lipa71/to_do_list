<div>
    <div wire:ignore.self tabindex="-1" id="traitModal" class="modal fade" role="dialog" aria-labelledby="traitModalLabel" aria-hidden="true">
        <div class="modal-dialog {{$modalSize}}" role="document" @if($fullHeight) style="height: 100%;margin: 0 auto;" @endif>
            <div class="modal-content" wire:loading.class="loading" @if($fullHeight) style="height: 100%;" @else style="min-height: 150px;" @endif>
                @if($isOpen)
                    @livewire($type, compact('params'))
                @else
                    <div class="modal-header mx-3">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

@push('livewireStack')
    <script type="text/javascript">
        window.livewire.on('jsModalOpen', () => {
            $('#traitModal').modal('show');
        });
        window.livewire.on('jsModalClose', () => {
            $('#traitModal').modal('hide');
        });
        $(document).ready(function () {
            $('#traitModal').on('hidden.coreui.modal', function () {
                if (typeof $(this).find('#ignoreCloseModalEmit').val() != 'undefined') {
                    if ($(this).find('#ignoreCloseModalEmit').val() == '1') {
                        return true;
                    }
                }
                Livewire.emit('closeModal');
            });
            $(document).on("click", ".closeBlankModal", function () {
                $('#traitModal').modal('hide');
            });
        });
    </script>
@endpush

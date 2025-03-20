<div>

</div>

@push('livewireStack')
    <script type="text/javascript">
        window.livewire.on('toast', message => {
            Toastify({
                text: message,
                backgroundColor: "#2eb85c",
                duration: 3000,
                style: {
                    background: "#2eb85c",
                }
            }).showToast();
        });
        window.livewire.on('toastWarning', message => {
            Toastify({
                text: message,
                backgroundColor: "#f90d0d",
                duration: 3000,
                style: {
                    background: "#f90d0d",
                }
            }).showToast();
        });
    </script>
@endpush

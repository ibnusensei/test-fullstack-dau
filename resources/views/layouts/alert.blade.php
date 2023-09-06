@push('after-scripts')
{{-- alert success --}}
@if (session('success'))
    <script>
        $(function() {
            // sweet alert
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 3000
            })
        });
    </script>
@endif

{{-- alert error --}}
@if (session('error'))
    <script>
        $(function() {
            // sweet alert
            Swal.fire({
                icon: 'error',
                title: 'Ooopss..',
                text: '{{ session('error') }}',
                showConfirmButton: false,
                timer: 3000
            })
        });
    </script>
@endif

@endpush

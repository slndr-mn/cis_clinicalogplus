<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if(session('success'))
<script>
Swal.fire({
    icon: 'success',
    title: 'Success',
    text: @json(session('success'))
});
</script>
@endif

@if(session('error'))
<script>
Swal.fire({
    icon: 'error',
    title: 'Error',
    text: @json(session('error'))
});
</script>
@endif

@if($errors->any())
<script>
Swal.fire({
    title: 'Validation Error',
    html: `{!! implode('<br>', $errors->all()) !!}`,
    icon: 'error'
});
</script>
@endif


<script>
    $(document).on('click', '.removeButton', function () {
    let userId = $(this).data('id');

    Swal.fire({
        title: 'Are you sure?',
        text: 'You will not be able to recover this user!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '{{ route('admin.staffdelete') }}',
                type: 'DELETE',
                data: {
                    id: userId,
                    _token: '{{ csrf_token() }}'
                },
                success: function (response) {
                    Swal.fire('Deleted!', response.success, 'success').then(() => {
                        location.reload(); // or remove row manually from DOM
                    });
                },
                error: function () {
                    Swal.fire('Error!', 'Something went wrong.', 'error');
                }
            });
        }
    });
});

    $(document).on('click', '.removeButtonMedstock', function () {
    let userId = $(this).data('id');

    Swal.fire({
        title: 'Are you sure?',
        text: 'You will not be able to recover this user!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '{{ route('admin.medstockdelete') }}',
                type: 'DELETE',
                data: {
                    id: userId,
                    _token: '{{ csrf_token() }}'
                },
                success: function (response) {
                    Swal.fire('Deleted!', response.success, 'success').then(() => {
                        location.reload(); // or remove row manually from DOM
                    });
                },
                error: function () {
                    Swal.fire('Error!', 'Something went wrong.', 'error');
                }
            });
        }
    });
});

</script>

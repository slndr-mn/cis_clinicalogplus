<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Password Reset Successful</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<script>
    Swal.fire({
        icon: 'success',
        title: 'Success!',
        text: 'Your password has been reset!',
        timer: 3000,
        showConfirmButton: false
    }).then(() => {
        window.location.href = "{{ route('login') }}";
    });
</script>
</body>
</html>

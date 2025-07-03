<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CIS:Clinicalog</title>
     @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" href="{{ asset('assets/img/ClinicaLog.ico') }}" type="image/x-icon" />
</head>

<body>
   @include('admin.header')

   <div class="d-flex">
        @include('admin.sidebar')

        <main class="p-4 flex-grow-1">
            @yield('content')
        </main>
    </div>

</body>
</html>
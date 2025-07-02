<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CIS</title>

    {{-- Vite CSS --}}
    @vite(['resources/css/indexstyle.css'])
    

    {{-- Favicon --}}
    <link rel="icon" href="{{ asset('/ClinicaLog.ico') }}" type="image/x-icon"/>
</head>

<body>
    <div class="wrapper"> 
        <img src="{{ asset('img/logo.png') }}" alt="logo" id="logo">

        <p id="name">
            <span class="line1">Campus Clinic</span><br>
            <span class="line2">Management System</span>
        </p>
 
        <a href="{{ url('/login') }}" class="button">
            Get Started <span class="arrow">→</span>
        </a>
    </div>
</body>

</html>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CIS</title>
    <link rel="icon" href="{{ asset('ClinicaLog.ico') }}" type="image/x-icon"/>
    @vite(['resources/css/forgotpass.css', 'resources/js/app.js']) 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <img src="{{ asset('img/logo.png') }}" alt="logo" id="logo">
    <h1 id="name">USeP Clinic Inventory System</h1>

    <div class="wrapper">
        <div class="login-wrapper">
              <form method="POST" action="{{ route('password.email') }}">
                @csrf
                
                 <p id="welcome">Forgot Password?</p>
                <p id="login2">Enter the email address you used for your account,
                    and we will send a verification code to enable you to change 
                    your password.</p>

                @if (session('success'))
                    <script>
                        Swal.fire('Success', '{{ session('success') }}', 'success');
                    </script>
                @endif

                @if (session('error'))
                    <script>
                        Swal.fire('Error', '{{ session('error') }}', 'error');
                    </script>
                @endif

                @error('email')
                    <script>
                        Swal.fire('Validation Error', '{{ $message }}', 'error');
                    </script>
                @enderror

                <div class="form-container">
                    <div class="form-group">
                        <label for="email" class="form-label">Email:</label>
                        <img src="{{ asset('img/email.png') }}" alt="email icon">
                        <input type="email" name="email" id="email" class="form-input" placeholder="Enter your Email" required>
                    </div>
                </div>

                <div class="buttons">
                    <button id="return" type="button" onclick="window.location.href='{{ route('login') }}'" >Back</button>
                    <button id="sendemail" type="submit">Send</button>
                </div>
            </form>
        </div>
    </div>
       
</body>
</html>

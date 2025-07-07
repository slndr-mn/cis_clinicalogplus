<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate, max-age=0">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">

    <title>CIS</title>
    <link rel="icon" href="{{ asset('ClinicaLog.ico') }}" type="image/x-icon" />
    @vite(['resources/css/forgotpass.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <img src="{{ asset('img/logo.png') }}" alt="logo" id="logo">
    <h1 id="name">USeP Clinic Inventory System</h1>

    <div class="wrapper">
        <div class="login-wrapper">
            <form method="POST" action="{{ route('otp.verify') }}">
                @csrf

                <p id="welcome">Verify Code to Login</p>
                <p id="login2">Enter the One-Time-Passcode sent to your email.</p>

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

                @error('otp')
                    <script>
                        Swal.fire('Validation Error', '{{ $message }}', 'error');
                    </script>
                @enderror

                <div id="countdown" style="text-align: center; margin-bottom: 15px; font-size: 14px; color: #555;">
                    Session expires in <span id="time">05:00</span>
                </div>

                <div class="form-container">
                    <div class="form-group">
                        <label for="otp" class="form-label">Code:</label>
                        <input type="text" name="otp" id="otp" class="form-input"
                            placeholder="Enter your code" required>
                    </div>
                </div>

                <div class="form-inline">
                    <label class="remember-me">
                        <input type="checkbox" id="remember" name="remember_device">
                        <span class="remember-text">Remember This Device</span>
                    </label>
                </div>

                <div id="remember-warning" class="remember-warning">
                    If you check this, OTP will not be required on your next login within 30 days.
                </div>

                <div class="buttons">
                    <button id="return" type="button"
                        onclick="window.location.href='{{ route('login') }}'">Back</button>
                    <button id="sendemail" type="submit">Send</button>
                </div>

            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const checkbox = document.getElementById('remember');
            const warning = document.getElementById('remember-warning');

            checkbox.addEventListener('change', function() {
                warning.style.display = this.checked ? 'block' : 'none';
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const checkbox = document.getElementById('remember');
            const warning = document.getElementById('remember-warning');
            const countdownDisplay = document.getElementById('time');
            let duration = 300; // 5 minutes in seconds

            checkbox.addEventListener('change', function() {
                warning.style.display = this.checked ? 'block' : 'none';
            });

            const timer = setInterval(function() {
                const minutes = Math.floor(duration / 60).toString().padStart(2, '0');
                const seconds = (duration % 60).toString().padStart(2, '0');
                countdownDisplay.textContent = `${minutes}:${seconds}`;

                if (--duration < 0) {
                    clearInterval(timer);
                    window.location.href = "{{ route('login') }}";
                }
            }, 1000);
        });
    </script>

</body>

</html>

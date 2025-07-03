<!DOCTYPE html> 
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CIS</title>
        <link rel="icon" href="{{ asset('ClinicaLog.ico') }}" type="image/x-icon"/>

     @vite(['resources/css/changepass.css', 'resources/js/app.js']) 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <img src="{{ asset('/img/logo.png') }}" alt="logo" id="logo">
    <h1 id="name">USeP Clinic Inventory System</h1>

    <div class="wrapper">
        <div class="login-wrapper">
            <p id="welcome">Change Password</p>
            <p id="login2">Create your new Password</p>

            @if (session('status'))
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: '{{ session('success') }}',
                        timer: 3000,
                        showConfirmButton: false
                    });
                </script>
            @endif

            @if ($errors->any())
                <script>
                    Swal.fire({
                        icon: 'error', 
                        title: 'Error',
                        html: `{!! implode('<br>', $errors->all()) !!}`,
                        timer: 5000,
                        showConfirmButton: true
                    });
                </script>
            @endif

            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <input type="hidden" name="email" value="{{ $email }}">

            
                <div class="form-container">
                    <div class="form-group">
                        <label for="password" class="form-label">Password:</label>
                        <img src="{{ asset('/img/password.png') }}" alt="password icon">
                        <input type="password" name="password" id="password" class="form-input" placeholder="Enter your new Password" required>
                        <input type="checkbox" id="show-password">
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation" class="form-label">Confirm Password:</label>
                        <img src="{{ asset('/img/password.png') }}" alt="password icon">
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-input" placeholder="Confirm Password" required>
                        <input type="checkbox" id="show-confirm">
                    </div>
                </div>

                <button type="submit" id="loginbtn">Submit</button>

                <div class="back-to-login">
                    <img src="{{ asset('/img/back.png') }}" alt="Back icon">
                    <a href="{{ route('login') }}" id="backlogin">Back to Login Page</a>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('show-password').addEventListener('change', function () {
            document.getElementById('password').type = this.checked ? 'text' : 'password';
        });

        document.getElementById('show-confirm').addEventListener('change', function () {
            document.getElementById('password_confirmation').type = this.checked ? 'text' : 'password';
        });
    </script>

    <script>
    const password = document.getElementById('password');
    const confirmPassword = document.getElementById('password_confirmation');

    // Create message elements
    const passwordMessage = document.createElement('p');
    passwordMessage.style.margin = '5px 0 0';
    passwordMessage.style.fontSize = '0.9em';

    const matchMessage = document.createElement('p');
    matchMessage.style.margin = '5px 0 0';
    matchMessage.style.fontSize = '0.9em';

    // Append to DOM
    password.parentNode.appendChild(passwordMessage);
    confirmPassword.parentNode.appendChild(matchMessage);

    function updateValidationMessages() {
        const passVal = password.value;
        const confirmVal = confirmPassword.value;
        let strength = 0;

        if (passVal.length >= 8) strength++;
        if (/[A-Z]/.test(passVal)) strength++;
        if (/[a-z]/.test(passVal)) strength++;
        if (/\d/.test(passVal)) strength++;
        if (/[\W_]/.test(passVal)) strength++;

        // Password strength check
        if (passVal.length === 0) {
            passwordMessage.textContent = '';
        } else if (strength >= 4) {
            passwordMessage.textContent = '🟢 Strong password';
            passwordMessage.style.color = 'green';
        } else if (strength === 3) {
            passwordMessage.textContent = '🟡 Medium strength password';
            passwordMessage.style.color = 'orange';
        } else {
            passwordMessage.textContent = '🔴 Weak password (Min. 8 characters, uppercase, lowercase, number)';
            passwordMessage.style.color = 'red';
        }

        // Password match check
        if (confirmVal.length > 0 || passVal.length > 0) {
            if (passVal === confirmVal) {
                matchMessage.textContent = '✅ Passwords match';
                matchMessage.style.color = 'green';
            } else {
                matchMessage.textContent = '❌ Passwords do not match';
                matchMessage.style.color = 'red';
            }
        } else {
            matchMessage.textContent = '';
        }
    }

    // Attach to events
    password.addEventListener('input', updateValidationMessages);
    confirmPassword.addEventListener('input', updateValidationMessages);
</script>


</body>
</html>

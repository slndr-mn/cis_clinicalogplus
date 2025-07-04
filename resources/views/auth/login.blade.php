<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CIS</title>
    <link rel="icon" href="{{ asset('ClinicaLog.ico') }}" type="image/x-icon"/>
    @vite(['resources/css/style.css', 'resources/js/app.js']) 
</head>
<body>
    <a href="../php-admin/index.php"></a>
    <img src="{{ asset('img/logo.png') }}" alt="logo" id="logo">
    <h1 id="name">USeP Clinic Inventory System</h1>

    <div class="wrapper">
        <div class="login-wrapper">
        <form id="login-form" action="{{ route('login') }}" method="post" autocomplete="off">
            @csrf

           
            <p id="welcome">Welcome!</p> 
            <p id="login2">Login to Continue</p>
            
             @if ($errors->any())
                <div style="text-align: center; color: red; margin-bottom: 1rem;">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif 
            <div class="form-container">
                <div class="form-group">
                    <label for="email" class="form-label">Email:</label> 
                    <img src="{{ asset('img/email.png') }}" alt="email icon">
                    <input type="text" name="user_email" id="email" class="form-input" autocomplete="email" placeholder="Enter your Email" required>
                </div>

                <div class="form-group">
                    <label for="password" class="form-label">Password:</label>
                    <img src="{{ asset('img/password.png') }}" alt="password icon">
                    <input type="password" name="user_password" id="password" class="form-input" autocomplete="current-password" placeholder="Enter your Password" required>
                    <input type="checkbox" id="show-password"> 
                </div>

                <div class="forgotpassword"> 
                    <span id="forgot">Forgot Password?</span>
                    <span id="click"><a href="{{ route('password.request') }}">Click Here.</a></span>
                </div>
            </div>

            <button id="loginbtn" type="submit">Login</button>
        </form>
        </div>
    </div> 
    <script>
        document.getElementById('show-password').addEventListener('change', function() {
            const passwordField = document.getElementById('password');
            if (this.checked) {
                passwordField.type = 'text';
            } else {
                passwordField.type = 'password'; 
            }
            });
    </script>
</body>
</html>
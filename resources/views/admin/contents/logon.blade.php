<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logon Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{asset('css/login.css')}}" rel="stylesheet">
</head>

<body class="bg-success">
    
    <div class="container mt-5">
        <div class="login-container bg-white p-3 bordered">
            <h2 class="text-center mb-4">Admin</h2>
            <form action="{{route('checkLogon')}}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="username" class="form-label">Email</label>
                    <input type="text" class="form-control" id="username" name="email" placeholder="Enter your username">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="remember-me">
                    <label class="form-check-label" for="remember-me">Remember me</label>
                </div>
                <button type="submit" class="btn btn-primary w-100 mb-3">Login</button>
                <div class="text-center">
                    <a href="reset_password.html" class="btn btn-link">Forgot your password?</a>
                </div>
                <div class="text-center">
                    <a href="register.html" class="btn btn-link">Register</a>
                </div>
            </form>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>
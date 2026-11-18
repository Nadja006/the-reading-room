<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The reading room</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="register-form">
        <h1>Welcome back</h1>
        <p>We're happy to have you back.</p>
        <form action="{{ route('login.store') }}" method="POST">
            @csrf

            <label for="email">Email address</label><br>
            <input type="email" name="email" id="email" placeholder="Enter your email" required><br>

            <label for="password">Password</label><br>
            <input type="password" name="password" id="password" placeholder="Create your password" required><br>

            <button type="submit">Login</button>
            <div>
                <p>Don't have an account?</p>
                <a href="{{ route('register') }}">Register</a>
            </div>
        </form>
    </div>
</body>
</html>
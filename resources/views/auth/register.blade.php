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
        <h1>Create an account</h1>
        <p>Join our little community of book lovers.</p>
        <form action="{{ route('register.store') }}" method="POST">
            @csrf

            <label for="name">Full name</label><br>
            @error('name')
                <span>{{ $message }}</span>
            @enderror
            <input type="text" name="name" id="name" placeholder="Enter your name" required><br>

            <label for="email">Email address</label><br>
            @error('email')
                <span>{{ $message }}</span>
            @enderror
            <input type="email" name="email" id="email" placeholder="Enter your email" required><br>

            <label for="password">Password</label><br>
            @error('password')
                <span>{{ $message }}</span>
            @enderror
            <input type="password" name="password" id="password" placeholder="Create your password" required><br>

            <button type="submit">Create Account</button>
            <div>
                <p>Already have an account?</p>
                <a href="{{ route('login') }}">Login</a>
            </div>
        </form>
    </div>
</body>
</html>
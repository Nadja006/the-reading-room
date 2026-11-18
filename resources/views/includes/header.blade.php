<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The reading room</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div id="app">

        <div id="header">
            <h2>the reading room.</h2>
            <div id="nav">
                <a href="{{ route('home') }}">Home</a>
                <a href="{{ route('catalog') }}">Catalog</a>
                @auth
                    <a href="{{ route('my_orders') }}">My orders</a>
                    <a href="{{ route('cart') }}"><img src="{{ asset('images/home/cart.png') }}" alt="Cart"></a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit">Logout</button>
                    </form>
                @endauth
                @guest
                    <a href="{{ route('register') }}">Register</a>
                    <a href="{{ route('login') }}">Login</a>
                @endguest
            </div>
        </div>
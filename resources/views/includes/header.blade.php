<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<header class="header">
    <div class="header-container">
        <div class="header-logo">MyLaravel</div>

        <nav class="nav-links">
            <a href="{{ url('/') }}">Home</a>
            <a href="{{ url('/about') }}">About</a>
            <a href="{{ url('/contact') }}">Contact</a>
            @guest
            <a href="{{ url('/login') }}">Login</a>
            <a href="{{ url('/register') }}">Register</a>
            @else
            <a href="{{ route('Auth.logout') }}">Logout</a>
            @endguest
</nav>
    </div>
    </header>

</body>
</html>
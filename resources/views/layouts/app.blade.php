<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RENTGO</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

    <nav class="navbar">
        <div class="logo">RENTGO</div>

        <div class="nav-links">
            <a href="/">Home</a>
            <a href="/cars">Cars</a>

            @guest
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Sign Up</a>
            @endguest

            @auth
 <a href="{{ route('dashboard') }}" class="profile-btn">
    <span>👤</span> Profile
</a>
            @endauth
        </div>
    </nav>

    @yield('content')

</body>
</html>
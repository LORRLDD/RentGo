<!DOCTYPE html>
<html>
<head>
    <title>RentGo</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

<!-- NAVBAR -->
<div class="navbar">
    <div class="logo">RENTGO</div>

    <div class="nav-links">
        <a href="/">Home</a>
        <a href="/cars">Cars</a>
        @auth
            <a href="/dashboard">Dashboard</a>
        @else
            <a href="/login">Login</a>
        @endauth
    </div>
</div>

<!-- HERO SECTION -->
<div class="hero">

    <div class="hero-content">
        <h1>
            Drive Your Journey <br>
            <span>Your Way</span>
        </h1>

        <p>
            Find the perfect car for your trip. <br>
            Easy booking, best prices, great service.
        </p>
    </div>

    <!-- SEARCH BOX -->
    <div class="search-box">
         <a href="/cars" class="search-btn">Search Cars</a>
    </div>

</div>

<!-- FEATURES -->
<div class="features">

    <div class="feature-card">
        <i data-lucide="car"></i>
        <h3>Wide Selection</h3>
        <p>Choose from a variety of cars.</p>
    </div>

    <div class="feature-card">
        <i data-lucide="tag"></i>
        <h3>Best Price</h3>
        <p>Get the best deals and save more.</p>
    </div>

    <div class="feature-card">
        <i data-lucide="calendar"></i>
        <h3>Easy Booking</h3>
        <p>Book your car in just a few clicks.</p>
    </div>

    <div class="feature-card">
        <i data-lucide="headphones"></i>
        <h3>24/7 Support</h3>
        <p>We’re here to help anytime.</p>
    </div>

</div>
@extends('layouts.app')

@section('content')
<div class="dashboard-wrapper">

    <aside class="dashboard-sidebar">
        <div>
            <div class="dashboard-brand">
                <h2>RentGo</h2>
                <span>Car Rental</span>
            </div>

            <nav class="dashboard-menu">
    <a href="{{ route('dashboard') }}" class="active">Dashboard</a>
    <a href="{{ route('cars.index') }}">Browse Cars</a>
    <a href="{{ route('bookings.index') }}">My Bookings</a>
    <a href="{{ route('profile.index') }}">My Profile</a>
    <a href="{{ route('payments.index') }}">Payments</a>
</nav>
        </div>

        <form action="{{ route('logout') }}" method="POST" class="dashboard-logout-form">
            @csrf
            <button type="submit" class="dashboard-logout-btn">Log Out</button>
        </form>
    </aside>

    <main class="dashboard-main">
        <header class="dashboard-header">
            <div>
                <h1>Dashboard</h1>
                <p>Welcome back, {{ Auth::user()->name ?? 'Customer' }}.</p>
            </div>
        </header>

        <section class="dashboard-stats">
            <div class="stat-card">
                <span>Total Bookings</span>
                <strong>3</strong>
            </div>

            <div class="stat-card">
                <span>Upcoming Trips</span>
                <strong>1</strong>
            </div>

            <div class="stat-card">
                <span>Completed Trips</span>
                <strong>2</strong>
            </div>

            <div class="stat-card">
                <span>Total Spent</span>
                <strong>₱8,600</strong>
            </div>
        </section>

        <section class="booking-card">
            <div>
                <span class="badge">Confirmed</span>
                <h2>Honda HR-V</h2>
                <p>May 20, 2026 - May 22, 2026</p>
                <p>SM City Cebu</p>
            </div>

            <a href="/cars" class="dashboard-btn">View Cars</a>
        </section>
    </main>

</div>
@endsection
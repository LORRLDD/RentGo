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
                <strong>{{ $totalBookings }}</strong>
            </div>

            <div class="stat-card">
                <span>Upcoming Trips</span>
                <strong>{{ $upcomingTrips }}</strong>
            </div>

            <div class="stat-card">
                <span>Completed Trips</span>
                <strong>{{ $completedTrips }}</strong>
            </div>

            <div class="stat-card">
                <span>Total Spent</span>
                <strong>₱{{ number_format($totalSpent, 2) }}</strong>
            </div>
        </section>

        @if($latestBooking)
            <section class="booking-card">
                <div>
                    <span class="badge">{{ $latestBooking->BookingStatus }}</span>
                    <h2>{{ $latestBooking->car->Brand ?? '' }} {{ $latestBooking->car->Model ?? 'Car' }}</h2>
                    <p>{{ $latestBooking->PickupDate }} - {{ $latestBooking->ReturnDate }}</p>
                    <p>Plate No: {{ $latestBooking->car->PlateNumber ?? 'N/A' }}</p>
                </div>

                <a href="{{ route('bookings.index') }}" class="dashboard-btn">View Booking</a>
            </section>
        @else
            <section class="booking-card">
                <div>
                    <span class="badge">No Booking</span>
                    <h2>No rented car yet</h2>
                    <p>Start booking your first RentGo car.</p>
                </div>

                <a href="{{ route('cars.index') }}" class="dashboard-btn">Browse Cars</a>
            </section>
        @endif
    </main>

</div>
@endsection
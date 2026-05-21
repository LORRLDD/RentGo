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
<<<<<<< HEAD
                <a href="{{ route('dashboard') }}" class="active">Dashboard</a>
                <a href="{{ route('cars.index') }}">Browse Cars</a>
                <a href="{{ route('bookings.index') }}">My Bookings</a>
                <a href="{{ route('profile.index') }}">My Profile</a>
                <a href="{{ route('payments.index') }}">Payments</a>
            </nav>
=======
    <a href="{{ route('dashboard') }}" class="active">Dashboard</a>
    <a href="{{ route('cars.index') }}">Browse Cars</a>
    <a href="{{ route('bookings.index') }}">My Bookings</a>
    <a href="{{ route('profile.index') }}">My Profile</a>
    <a href="{{ route('payments.index') }}">Payments</a>
</nav>
>>>>>>> 08b6d1334bbe4e4929c1ad5c42e60f24abef3c50
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
<<<<<<< HEAD
                <strong>{{ $totalBookings }}</strong>
=======
                <strong>3</strong>
>>>>>>> 08b6d1334bbe4e4929c1ad5c42e60f24abef3c50
            </div>

            <div class="stat-card">
                <span>Upcoming Trips</span>
<<<<<<< HEAD
                <strong>{{ $upcomingTrips }}</strong>
=======
                <strong>1</strong>
>>>>>>> 08b6d1334bbe4e4929c1ad5c42e60f24abef3c50
            </div>

            <div class="stat-card">
                <span>Completed Trips</span>
<<<<<<< HEAD
                <strong>{{ $completedTrips }}</strong>
=======
                <strong>2</strong>
>>>>>>> 08b6d1334bbe4e4929c1ad5c42e60f24abef3c50
            </div>

            <div class="stat-card">
                <span>Total Spent</span>
<<<<<<< HEAD
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
=======
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
>>>>>>> 08b6d1334bbe4e4929c1ad5c42e60f24abef3c50
    </main>

</div>
@endsection
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
                <a href="{{ route('dashboard') }}">Dashboard</a>
                <a href="{{ route('cars.index') }}">Browse Cars</a>
                <a href="{{ route('bookings.index') }}" class="active">My Bookings</a>
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
                <h1>My Bookings</h1>
                <p>Manage your premium RentGo reservations.</p>
            </div>
        </header>

        @if(session('success'))
            <div class="success-alert">
                {{ session('success') }}
            </div>
        @endif

        <section class="booking-list">
            @forelse($bookings as $booking)
                <div class="luxury-booking-card">
                    <div class="booking-car-info">
                        <span class="badge">{{ $booking->BookingStatus }}</span>

                        <h2>
                            {{ $booking->car->Brand ?? 'Car' }}
                            {{ $booking->car->Model ?? '' }}
                        </h2>

                        <p>
                            {{ $booking->PickupDate }}
                            -
                            {{ $booking->ReturnDate }}
                        </p>

                        <p>Booking ID: #{{ $booking->BookingID }}</p>
                    </div>

                    <div class="booking-price-box">
                        <span>Total</span>
                        <strong>₱{{ number_format($booking->TotalAmount, 2) }}</strong>

<<<<<<< HEAD
                        <a href="{{ url('/booking-details/' . $booking->BookingID) }}" class="dashboard-btn">
    View Details
</a>

                        @if($booking->BookingStatus === 'Pending')
                            <form action="{{ route('booking.cancel', $booking->BookingID) }}" method="POST" style="margin-top: 10px;">
                                @csrf
                                @method('PUT')

                                <button type="submit"
                                        class="dashboard-btn"
                                        onclick="return confirm('Are you sure you want to cancel this booking?')">
                                    Cancel Booking
                                </button>
                            </form>
                        @endif
=======
                        <a href="{{ route('booking.details') }}" class="dashboard-btn">
                            View Details
                        </a>
>>>>>>> 08b6d1334bbe4e4929c1ad5c42e60f24abef3c50
                    </div>
                </div>
            @empty
                <div class="luxury-page-card">
                    <h2>No bookings yet</h2>
                    <p>You have not booked any cars yet.</p>
                    <a href="{{ route('cars.index') }}" class="dashboard-btn">Browse Cars</a>
                </div>
            @endforelse
        </section>
    </main>

</div>
@endsection
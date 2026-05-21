@extends('layouts.app')

@section('content')
<div class="dashboard-wrapper">

<<<<<<< HEAD
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
                <h1>Booking Details</h1>
                <p>View your premium RentGo reservation summary.</p>
            </div>
        </header>

        <section class="booking-details-modern-card">

            <div class="booking-details-image">
                <img src="{{ $booking->car->Image ?? '' }}" alt="{{ $booking->car->Brand ?? 'Car' }}">
            </div>

            <div class="booking-details-content">
                <div class="booking-details-top">
                    <div>
                        <span class="badge">{{ $booking->BookingStatus }}</span>
                        <h2>{{ $booking->car->Brand ?? 'Car' }} {{ $booking->car->Model ?? '' }}</h2>
                        <p>Booking ID: #{{ $booking->BookingID }}</p>
                    </div>

                    <div class="booking-details-total">
                        <span>Total Amount</span>
                        <strong>₱{{ number_format($booking->TotalAmount, 2) }}</strong>
                    </div>
                </div>

                <div class="booking-details-grid">
                    <div class="booking-detail-item">
                        <span>Pickup Date</span>
                        <strong>{{ $booking->PickupDate }}</strong>
                    </div>

                    <div class="booking-detail-item">
                        <span>Return Date</span>
                        <strong>{{ $booking->ReturnDate }}</strong>
                    </div>

                    <div class="booking-detail-item">
                        <span>Plate Number</span>
                        <strong>{{ $booking->car->PlateNumber ?? 'N/A' }}</strong>
                    </div>

                    <div class="booking-detail-item">
                        <span>Transmission</span>
                        <strong>{{ $booking->car->Transmission ?? 'N/A' }}</strong>
                    </div>

                    <div class="booking-detail-item">
                        <span>Fuel Type</span>
                        <strong>{{ $booking->car->FuelType ?? 'N/A' }}</strong>
                    </div>

                    <div class="booking-detail-item">
                        <span>Seats</span>
                        <strong>{{ $booking->car->Seats ?? 'N/A' }}</strong>
                    </div>
                </div>

                <div class="booking-detail-actions">
                    <a href="{{ route('bookings.index') }}" class="dashboard-btn">
                        Back to My Bookings
                    </a>

                    @if($booking->BookingStatus !== 'Cancelled' && $booking->BookingStatus !== 'Completed')
                        <form action="{{ route('booking.cancel', $booking->BookingID) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <button type="submit" class="cancel-booking-btn"
                                    onclick="return confirm('Are you sure you want to cancel this booking?')">
                                Cancel Booking
                            </button>
                        </form>
                    @endif
                </div>
            </div>

=======
    <main class="dashboard-main">
        <header class="dashboard-header">
            <h1>Booking Details</h1>
            <p>Your premium RentGo reservation summary.</p>
        </header>

        <section class="luxury-page-card">
            <span class="badge">Confirmed</span>

            <h2>Honda HR-V</h2>

            <div class="detail-grid">
                <div class="detail-box">
                    <span>Rent Date</span>
                    <strong>May 20, 2026</strong>
                </div>

                <div class="detail-box">
                    <span>Return Date</span>
                    <strong>May 22, 2026</strong>
                </div>

                <div class="detail-box">
                    <span>Pickup Location</span>
                    <strong>SM City Cebu</strong>
                </div>

                <div class="detail-box">
                    <span>Total Cost</span>
                    <strong>₱4,400</strong>
                </div>

                <div class="detail-box">
                    <span>Paid</span>
                    <strong>₱2,000</strong>
                </div>

                <div class="detail-box">
                    <span>Remaining Balance</span>
                    <strong class="gold-price">₱2,400</strong>
                </div>
            </div>

            <a href="{{ route('bookings.index') }}" class="dashboard-btn">
                Back to My Bookings
            </a>
>>>>>>> 08b6d1334bbe4e4929c1ad5c42e60f24abef3c50
        </section>
    </main>

</div>
@endsection
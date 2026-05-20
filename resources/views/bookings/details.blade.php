@extends('layouts.app')

@section('content')
<div class="dashboard-wrapper">

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
        </section>
    </main>

</div>
@endsection
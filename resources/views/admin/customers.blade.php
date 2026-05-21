@extends('layouts.app')

@section('content')
<div class="admin-wrapper">

    <aside class="admin-sidebar">
        <div>
            <div class="admin-brand">
                <h2>RENTGO</h2>
                <span>ADMIN PANEL</span>
            </div>

            <nav class="admin-menu">
                <a href="{{ route('admin.dashboard') }}">Admin Dashboard</a>
                <a href="{{ route('admin.owned-cars') }}">Owned Cars</a>
                <a href="{{ route('admin.customers') }}" class="active">Customers</a>
                <a href="{{ route('admin.analytics') }}">Analytics</a>
                <a href="{{ route('admin.profile') }}">Admin Profile</a>
            </nav>
        </div>

        <form action="{{ route('logout') }}" method="POST" class="admin-logout-form">
            @csrf
            <button type="submit" class="admin-logout-btn">Log Out</button>
        </form>
    </aside>

    <main class="admin-main">
        <header class="admin-header">
            <h1>Customers</h1>
            <p>View all customer rentals grouped by account.</p>
        </header>

        @if(session('success'))
            <div class="success-alert">
                {{ session('success') }}
            </div>
        @endif

        @foreach($customers as $customer)

            <section class="admin-panel customer-group-card">
                <div class="customer-group-header">
                    <h2>Customer #{{ $customer->id }}</h2>
                    <span>{{ $customer->name }}</span>
                    <p>{{ $customer->email }}</p>
                </div>

                @forelse($customer->bookings as $booking)
                    <div class="admin-customer-card">

                        <img src="{{ $booking->car->Image ?? '' }}"
                             alt="{{ $booking->car->Brand ?? 'Car' }}">

                        <div class="customer-car-info">
                            <h3>
                                {{ $booking->car->Brand ?? '' }}
                                {{ $booking->car->Model ?? '' }}
                            </h3>

                            <p>Booking ID: #{{ $booking->BookingID }}</p>
                            <p>Pickup: {{ $booking->PickupDate }}</p>
                            <p>Return: {{ $booking->ReturnDate }}</p>
                            <p>Status: {{ $booking->BookingStatus }}</p>

                            @if($booking->BookingStatus === 'Pending')
                                <form action="{{ route('admin.booking.accept', $booking->BookingID) }}" method="POST" style="margin-top: 12px;">
                                    @csrf
                                    @method('PUT')

                                    <button type="submit"
                                            class="dashboard-btn"
                                            onclick="return confirm('Accept this booking?')">
                                        Accept Booking
                                    </button>
                                </form>
                            @endif
                        </div>

                        <div class="customer-payment-info">
                            <span>Total Amount</span>
                            <strong>
                                ₱{{ number_format($booking->TotalAmount, 2) }}
                            </strong>
                        </div>
                    </div>
                @empty
                    <div class="no-booking-box">
                        No rented cars yet.
                    </div>
                @endforelse
            </section>

        @endforeach
    </main>
</div>
@endsection
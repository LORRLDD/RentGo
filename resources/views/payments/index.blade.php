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
                <a href="{{ route('bookings.index') }}">My Bookings</a>
                <a href="{{ route('profile.index') }}">My Profile</a>
                <a href="{{ route('payments.index') }}" class="active">Payments</a>
            </nav>
        </div>

        <form action="{{ route('logout') }}" method="POST" class="dashboard-logout-form">
            @csrf
            <button type="submit" class="dashboard-logout-btn">Log Out</button>
        </form>
    </aside>

    <main class="dashboard-main">
        <header class="dashboard-header">
            <h1>Payments</h1>
            <p>Secure RentGo payment gateway simulation.</p>
        </header>

        @if(session('success'))
            <div class="success-alert">{{ session('success') }}</div>
        @endif

        <section class="payment-grid">
            <div class="payment-card">
                <h2>Pay Booking</h2>

                <form action="{{ route('payments.store') }}" method="POST">
                    @csrf

                    <label>Car Name</label>
                    <input type="text" name="car_name" value="Honda HR-V" required>

                    <label>Amount</label>
                    <input type="number" name="amount" value="4400" required>

                    <label>Payment Method</label>
                    <select name="payment_method" required>
                        <option value="GCash">GCash</option>
                        <option value="Maya">Maya</option>
                        <option value="Credit Card">Credit Card</option>
                        <option value="Cash">Cash</option>
                    </select>

                    <button type="submit" class="dashboard-btn payment-submit">
                        Pay Now
                    </button>
                </form>
            </div>

            <div class="payment-card">
                <h2>Payment History</h2>

                @forelse($payments as $payment)
                    <div class="payment-history-item">
                        <strong>{{ $payment->car_name }}</strong>
                        <span>₱{{ number_format($payment->amount, 2) }}</span>
                        <p>{{ $payment->payment_method }} • {{ $payment->status }}</p>
                        <small>{{ $payment->reference_number }}</small>
                    </div>
                @empty
                    <p class="empty-payment">No payments yet.</p>
                @endforelse
            </div>
        </section>
    </main>

</div>
@endsection
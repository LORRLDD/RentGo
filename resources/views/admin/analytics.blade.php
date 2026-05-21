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
                <a href="{{ route('admin.customers') }}">Customers</a>
                <a href="{{ route('admin.analytics') }}" class="active">Analytics</a>
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
            <h1>Analytics</h1>
            <p>Real-time RentGo business insights from your database.</p>
        </header>

        <section class="analytics-summary-grid">
            <div class="analytics-stat-card">
                <div class="analytics-icon">🚗</div>
                <span>Total Cars</span>
                <strong>{{ $totalCars }}</strong>
            </div>

            <div class="analytics-stat-card">
                <div class="analytics-icon">✅</div>
                <span>Available Cars</span>
                <strong>{{ $availableCars }}</strong>
            </div>

            <div class="analytics-stat-card">
                <div class="analytics-icon">🔑</div>
                <span>Rented Cars</span>
                <strong>{{ $rentedCars }}</strong>
            </div>

            <div class="analytics-stat-card">
                <div class="analytics-icon">👥</div>
                <span>Customers</span>
                <strong>{{ $totalCustomers }}</strong>
            </div>

            <div class="analytics-stat-card">
                <div class="analytics-icon">📄</div>
                <span>Total Bookings</span>
                <strong>{{ $totalBookings }}</strong>
            </div>

            <div class="analytics-stat-card">
                <div class="analytics-icon">📌</div>
                <span>Booked</span>
                <strong>{{ $bookedBookings }}</strong>
            </div>

            <div class="analytics-stat-card">
                <div class="analytics-icon">⏳</div>
                <span>Pending</span>
                <strong>{{ $pendingBookings }}</strong>
            </div>

            <div class="analytics-stat-card">
                <div class="analytics-icon">💰</div>
                <span>Total Revenue</span>
                <strong>₱{{ number_format($totalRevenue, 2) }}</strong>
            </div>
        </section>

        <section class="analytics-dashboard-grid">
            <div class="analytics-panel">
                <h2>Fleet Availability</h2>

                @php
                    $availablePercent = $totalCars > 0 ? round(($availableCars / $totalCars) * 100) : 0;
                    $rentedPercent = $totalCars > 0 ? round(($rentedCars / $totalCars) * 100) : 0;
                @endphp

                <div class="analytics-progress-item">
                    <div>
                        <span>Available Cars</span>
                        <strong>{{ $availablePercent }}%</strong>
                    </div>
                    <div class="analytics-progress-bar">
                        <div style="width: {{ $availablePercent }}%;"></div>
                    </div>
                </div>

                <div class="analytics-progress-item">
                    <div>
                        <span>Rented Cars</span>
                        <strong>{{ $rentedPercent }}%</strong>
                    </div>
                    <div class="analytics-progress-bar">
                        <div style="width: {{ $rentedPercent }}%;"></div>
                    </div>
                </div>
            </div>

            <div class="analytics-panel">
                <h2>Booking Status</h2>

                @php
                    $bookedPercent = $totalBookings > 0 ? round(($bookedBookings / $totalBookings) * 100) : 0;
                    $pendingPercent = $totalBookings > 0 ? round(($pendingBookings / $totalBookings) * 100) : 0;
                    $cancelledPercent = $totalBookings > 0 ? round(($cancelledBookings / $totalBookings) * 100) : 0;
                @endphp

                <div class="analytics-progress-item">
                    <div>
                        <span>Booked</span>
                        <strong>{{ $bookedPercent }}%</strong>
                    </div>
                    <div class="analytics-progress-bar">
                        <div style="width: {{ $bookedPercent }}%;"></div>
                    </div>
                </div>

                <div class="analytics-progress-item">
                    <div>
                        <span>Pending</span>
                        <strong>{{ $pendingPercent }}%</strong>
                    </div>
                    <div class="analytics-progress-bar">
                        <div style="width: {{ $pendingPercent }}%;"></div>
                    </div>
                </div>

                <div class="analytics-progress-item">
                    <div>
                        <span>Cancelled</span>
                        <strong>{{ $cancelledPercent }}%</strong>
                    </div>
                    <div class="analytics-progress-bar">
                        <div style="width: {{ $cancelledPercent }}%;"></div>
                    </div>
                </div>
            </div>
        </section>
    </main>

</div>
@endsection
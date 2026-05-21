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
                <a href="{{ route('admin.dashboard') }}" class="active">Admin Dashboard</a>
                <a href="{{ route('admin.owned-cars') }}">Owned Cars</a>
                <a href="{{ route('admin.customers') }}">Customers</a>
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
            <h1>Admin Dashboard</h1>
            <p>Welcome back, {{ Auth::user()->name }}. Manage RentGo system operations.</p>
        </header>

        <section class="admin-stats">
            <div class="admin-stat-card">
                <span>Total Cars</span>
                <strong>{{ $totalCars }}</strong>
            </div>

            <div class="admin-stat-card">
                <span>Total Customers</span>
                <strong>{{ $totalCustomers }}</strong>
            </div>

            <div class="admin-stat-card">
                <span>Total Bookings</span>
                <strong>{{ $totalBookings }}</strong>
            </div>

            <div class="admin-stat-card">
                <span>Total Revenue</span>
                <strong>₱{{ number_format($totalRevenue, 2) }}</strong>
            </div>
        </section>

        <section class="admin-grid">
            <div class="admin-panel">
                <h2>Latest Customers</h2>

                @forelse($customers as $customer)
                    <div class="admin-row">
                        <span>{{ $customer->name }}</span>
                        <span>{{ $customer->email }}</span>
                        <strong>{{ ucfirst($customer->role) }}</strong>
                    </div>
                @empty
                    <p style="color:#94a3b8;">No customers yet.</p>
                @endforelse
            </div>

            <div class="admin-panel">
                <h2>Analytics</h2>

                <div class="analytics-box">
                    <span>Cars in System</span>
                    <strong>{{ $totalCars }}</strong>
                    <div class="analytics-bar"><div style="width:100%"></div></div>
                </div>

                <div class="analytics-box">
                    <span>Bookings Recorded</span>
                    <strong>{{ $totalBookings }}</strong>
                    <div class="analytics-bar"><div style="width:100%"></div></div>
                </div>
            </div>
        </section>
    </main>

</div>
@endsection
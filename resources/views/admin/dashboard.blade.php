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
<<<<<<< HEAD
                <strong>{{ $totalCars }}</strong>
=======
                <strong>12</strong>
>>>>>>> 08b6d1334bbe4e4929c1ad5c42e60f24abef3c50
            </div>

            <div class="admin-stat-card">
                <span>Total Customers</span>
<<<<<<< HEAD
                <strong>{{ $totalCustomers }}</strong>
=======
                <strong>25</strong>
>>>>>>> 08b6d1334bbe4e4929c1ad5c42e60f24abef3c50
            </div>

            <div class="admin-stat-card">
                <span>Total Bookings</span>
<<<<<<< HEAD
                <strong>{{ $totalBookings }}</strong>
=======
                <strong>48</strong>
>>>>>>> 08b6d1334bbe4e4929c1ad5c42e60f24abef3c50
            </div>

            <div class="admin-stat-card">
                <span>Total Revenue</span>
<<<<<<< HEAD
                <strong>₱{{ number_format($totalRevenue, 2) }}</strong>
=======
                <strong>₱120,000</strong>
>>>>>>> 08b6d1334bbe4e4929c1ad5c42e60f24abef3c50
            </div>
        </section>

        <section class="admin-grid">
            <div class="admin-panel">
<<<<<<< HEAD
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
=======
                <h2>Customers</h2>

                <div class="admin-row">
                    <span>John Waytuli</span>
                    <span>johnwaytuli@gmail.com</span>
                    <strong>Active</strong>
                </div>

                <div class="admin-row">
                    <span>RentGo Admin</span>
                    <span>admin@rentgo.com</span>
                    <strong>Admin</strong>
                </div>
>>>>>>> 08b6d1334bbe4e4929c1ad5c42e60f24abef3c50
            </div>

            <div class="admin-panel">
                <h2>Analytics</h2>

                <div class="analytics-box">
<<<<<<< HEAD
                    <span>Cars in System</span>
                    <strong>{{ $totalCars }}</strong>
                    <div class="analytics-bar"><div style="width:100%"></div></div>
                </div>

                <div class="analytics-box">
                    <span>Bookings Recorded</span>
                    <strong>{{ $totalBookings }}</strong>
                    <div class="analytics-bar"><div style="width:100%"></div></div>
=======
                    <span>Bookings Growth</span>
                    <strong>72%</strong>
                    <div class="analytics-bar"><div style="width:72%"></div></div>
                </div>

                <div class="analytics-box">
                    <span>Revenue Target</span>
                    <strong>80%</strong>
                    <div class="analytics-bar"><div style="width:80%"></div></div>
>>>>>>> 08b6d1334bbe4e4929c1ad5c42e60f24abef3c50
                </div>
            </div>
        </section>
    </main>

</div>
@endsection
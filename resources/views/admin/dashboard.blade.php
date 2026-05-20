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
                <strong>12</strong>
            </div>

            <div class="admin-stat-card">
                <span>Total Customers</span>
                <strong>25</strong>
            </div>

            <div class="admin-stat-card">
                <span>Total Bookings</span>
                <strong>48</strong>
            </div>

            <div class="admin-stat-card">
                <span>Total Revenue</span>
                <strong>₱120,000</strong>
            </div>
        </section>

        <section class="admin-grid">
            <div class="admin-panel">
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
            </div>

            <div class="admin-panel">
                <h2>Analytics</h2>

                <div class="analytics-box">
                    <span>Bookings Growth</span>
                    <strong>72%</strong>
                    <div class="analytics-bar"><div style="width:72%"></div></div>
                </div>

                <div class="analytics-box">
                    <span>Revenue Target</span>
                    <strong>80%</strong>
                    <div class="analytics-bar"><div style="width:80%"></div></div>
                </div>
            </div>
        </section>
    </main>

</div>
@endsection
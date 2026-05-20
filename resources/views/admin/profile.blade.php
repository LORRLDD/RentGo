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
                <a href="{{ route('admin.analytics') }}">Analytics</a>
                <a href="{{ route('admin.profile') }}" class="active">Admin Profile</a>
            </nav>
        </div>

        <form action="{{ route('logout') }}" method="POST" class="admin-logout-form">
            @csrf
            <button type="submit" class="admin-logout-btn">Log Out</button>
        </form>
    </aside>

    <main class="admin-main">
        <header class="admin-header">
            <h1>Admin Profile</h1>
            <p>Manage your RentGo admin account.</p>
        </header>

        <section class="profile-hero-card">
            <div class="profile-avatar-large">
                {{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}
            </div>

            <div>
                <h2>{{ Auth::user()->name }}</h2>
                <p>{{ Auth::user()->email }}</p>
                <span>RentGo {{ ucfirst(Auth::user()->role) }}</span>
            </div>
        </section>

        <section class="profile-grid">
            <div class="profile-panel">
                <h3>Admin Information</h3>

                <div class="profile-field">
                    <span>Full Name</span>
                    <strong>{{ Auth::user()->name }}</strong>
                </div>

                <div class="profile-field">
                    <span>Email Address</span>
                    <strong>{{ Auth::user()->email }}</strong>
                </div>

                <div class="profile-field">
                    <span>Account Type</span>
                    <strong>{{ ucfirst(Auth::user()->role) }}</strong>
                </div>
            </div>

            <div class="profile-panel">
                <h3>Admin Access</h3>

                <div class="profile-field">
                    <span>System Role</span>
                    <strong>Administrator</strong>
                </div>

                <div class="profile-field">
                    <span>Status</span>
                    <strong class="profile-status">Active</strong>
                </div>
            </div>
        </section>
    </main>

</div>
@endsection
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
                @if(Auth::user()->role === 'admin')
                    <a href="{{ route('admin.dashboard') }}">Admin Dashboard</a>
                    <a href="{{ route('admin.cars') }}">Admin Cars</a>
                    <a href="{{ route('admin.analytics') }}">Analytics</a>
                    <a href="{{ route('admin.profile') }}" class="active">Admin Profile</a>
                @else
                    <a href="{{ route('dashboard') }}">Dashboard</a>
                    <a href="{{ route('cars.index') }}">Browse Cars</a>
                    <a href="{{ route('bookings.index') }}">My Bookings</a>
                    <a href="{{ route('profile.index') }}" class="active">My Profile</a>
                    <a href="{{ route('payments.index') }}">Payments</a>
                @endif
            </nav>
        </div>

        <form action="{{ route('logout') }}" method="POST" class="dashboard-logout-form">
            @csrf
            <button type="submit" class="dashboard-logout-btn">Log Out</button>
        </form>
    </aside>

    <main class="dashboard-main">
        <header class="dashboard-header">
            <h1>{{ Auth::user()->role === 'admin' ? 'Admin Profile' : 'My Profile' }}</h1>
            <p>Manage your RentGo account information.</p>
        </header>

        @if(session('success'))
            <div class="success-alert">
                {{ session('success') }}
            </div>
        @endif

        <section class="profile-hero-card">
            <div class="profile-avatar-large">
                {{ strtoupper(substr(Auth::user()->name ?? 'C', 0, 1)) }}
            </div>

            <div>
                <h2>{{ Auth::user()->name ?? 'Customer' }}</h2>
                <p>{{ Auth::user()->email ?? 'No email found' }}</p>
                <span>
                    Premium RentGo {{ ucfirst(Auth::user()->role ?? 'customer') }}
                </span>
            </div>
        </section>

        <section class="profile-grid">

            <div class="profile-panel">
                <div class="profile-panel-header">
                    <h3>Personal Information</h3>

                    <button type="button" class="dashboard-btn edit-profile-btn" onclick="toggleEditProfile()">
                        Edit
                    </button>
                </div>

                <div id="profile-view">
                    <div class="profile-field">
                        <span>Full Name</span>
                        <strong>{{ Auth::user()->name ?? 'Customer' }}</strong>
                    </div>

                    <div class="profile-field">
                        <span>Email Address</span>
                        <strong>{{ Auth::user()->email ?? 'No email found' }}</strong>
                    </div>

                    <div class="profile-field">
                        <span>Account Type</span>
                        <strong>{{ ucfirst(Auth::user()->role ?? 'customer') }}</strong>
                    </div>
                </div>

                <form id="profile-edit-form" action="{{ route('profile.update') }}" method="POST" class="profile-edit-hidden">
                    @csrf
                    @method('PUT')

                    <div class="profile-input-group">
                        <label>Full Name</label>
                        <input type="text" name="name" value="{{ old('name', Auth::user()->name) }}" required>
                    </div>

                    <div class="profile-input-group">
                        <label>Email Address</label>
                        <input type="email" name="email" value="{{ old('email', Auth::user()->email) }}" required>
                    </div>

                    <div class="profile-edit-actions">
                        <button type="submit" class="dashboard-btn">Save Changes</button>

                        <button type="button" class="cancel-edit-btn" onclick="toggleEditProfile()">
                            Cancel
                        </button>
                    </div>
                </form>
            </div>

            <div class="profile-panel">
                <h3>Account Security</h3>

                <div class="profile-field">
                    <span>Password</span>
                    <strong>Protected</strong>
                </div>

                <div class="profile-field">
                    <span>Status</span>
                    <strong class="profile-status">Active</strong>
                </div>
            </div>

        </section>
    </main>

</div>

<script>
    function toggleEditProfile() {
        const viewBox = document.getElementById('profile-view');
        const editForm = document.getElementById('profile-edit-form');

        viewBox.classList.toggle('profile-edit-hidden');
        editForm.classList.toggle('profile-edit-hidden');
    }
</script>
@endsection
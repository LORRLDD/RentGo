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
                <a href="{{ route('admin.owned-cars') }}" class="active">Owned Cars</a>
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
        <header class="admin-header admin-header-row">
            <div>
                <h1>Owned Cars</h1>
                <p>Manage RentGo fleet vehicles, availability, pricing, and listings.</p>
            </div>
        </header>

        @if(session('success'))
            <div class="success-alert">{{ session('success') }}</div>
        @endif

        <section class="admin-add-car-card">
            <h2>Add New Car</h2>

            <form action="{{ route('admin.owned-cars.store') }}" method="POST" class="admin-car-form">
                @csrf

                <input type="text" name="Brand" placeholder="Brand" required>
                <input type="text" name="Model" placeholder="Model" required>
                <input type="number" name="Year" placeholder="Year" required>
                <input type="text" name="Transmission" placeholder="Automatic / Manual" required>
                <input type="text" name="FuelType" placeholder="Fuel Type" required>
                <input type="number" name="Seats" placeholder="Seats" required>
                <input type="number" name="PricePerDay" placeholder="Price Per Day" required>
                <input type="text" name="Image" placeholder="Image URL" required>

                <button type="submit">Add New Car</button>
            </form>
        </section>

        <section class="admin-fleet-list">
            @foreach($cars as $car)
                <div class="admin-fleet-card">
                    <img src="{{ $car->Image }}" alt="{{ $car->Brand }} {{ $car->Model }}">

                    <div class="admin-fleet-info">
                        <h2>{{ $car->Brand }} {{ $car->Model }}</h2>
                        <p>{{ $car->Year }} • {{ $car->Transmission }} • {{ $car->FuelType }}</p>

                        <div class="admin-fleet-meta">
                            <span>{{ $car->Seats }} Seats</span>
                            <strong>₱{{ number_format($car->PricePerDay, 2) }} / day</strong>
                        </div>
                    </div>

                    <div class="admin-fleet-actions">
                        <form action="{{ route('admin.owned-cars.status', $car->CarID) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <select name="Status" onchange="this.form.submit()">
                                <option value="Available" {{ ($car->Status ?? '') == 'Available' ? 'selected' : '' }}>
                                    Available
                                </option>
                                <option value="Rented" {{ ($car->Status ?? '') == 'Rented' ? 'selected' : '' }}>
                                    Rented
                                </option>
                            </select>
                        </form>

                        <form action="{{ route('admin.owned-cars.delete', $car->CarID) }}" method="POST"
                              onsubmit="return confirm('Delete this car?')">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="delete-car-btn">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </section>
    </main>

</div>
@endsection
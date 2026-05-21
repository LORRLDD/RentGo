<!DOCTYPE html>
<html>
<head>
    <title>Car Details</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

<div class="navbar">
    <div class="logo">RENTGO</div>
    <div class="nav-links">
        <a href="/">Home</a>
        <a href="/cars">Cars</a>

        @auth
            <a href="{{ Auth::user()->role === 'admin' ? route('admin.profile') : route('profile.index') }}">Profile</a>
        @endauth
    </div>
</div>

<div class="detail-container">

    <div class="detail-image">
        <img src="{{ $car->Image }}" alt="{{ $car->Brand }} {{ $car->Model }}">
    </div>

    <div class="detail-info">
        <h1>{{ $car->Brand }} {{ $car->Model }}</h1>

        <p class="desc">
            Experience luxury driving with premium comfort and performance.
        </p>

        <div class="specs">
            <div><strong>Year:</strong> {{ $car->Year }}</div>
            <div><strong>Plate Number:</strong> {{ $car->PlateNumber ?? 'N/A' }}</div>
            <div><strong>Transmission:</strong> {{ $car->Transmission }}</div>
            <div><strong>Fuel:</strong> {{ $car->FuelType }}</div>
            <div><strong>Seats:</strong> {{ $car->Seats }}</div>
            <div><strong>Status:</strong> {{ $car->Status ?? 'Available' }}</div>
        </div>

        <h2 class="price">₱{{ number_format($car->PricePerDay, 2) }} / day</h2>
    </div>

    @if(!Auth::check() || Auth::user()->role !== 'admin')
        <div class="booking-box">
            <h3>Book Your Car</h3>

            @if(session('success'))
                <div class="success-alert">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('book.store') }}" method="POST" class="booking-form">
                @csrf

                <input type="hidden" name="CarID" value="{{ $car->CarID }}">

                <label>Pick-up Date</label>
                <input type="date" name="PickupDate" required>

                <label>Return Date</label>
                <input type="date" name="ReturnDate" required>

                <button type="submit" class="confirm-booking-btn">
                    Confirm Booking
                </button>
            </form>
        </div>
    @endif

</div>

</body>
</html>
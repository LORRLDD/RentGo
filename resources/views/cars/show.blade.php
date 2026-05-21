<!DOCTYPE html>
<html>
<head>
    <title>Car Details</title>
<<<<<<< HEAD
    @vite(['resources/css/app.css', 'resources/js/app.js'])
=======
    @vite(['resources/css/app.css'])
>>>>>>> 08b6d1334bbe4e4929c1ad5c42e60f24abef3c50
</head>
<body>

<div class="navbar">
    <div class="logo">RENTGO</div>
    <div class="nav-links">
        <a href="/">Home</a>
        <a href="/cars">Cars</a>
<<<<<<< HEAD

        @auth
            <a href="{{ Auth::user()->role === 'admin' ? route('admin.profile') : route('profile.index') }}">Profile</a>
        @endauth
=======
>>>>>>> 08b6d1334bbe4e4929c1ad5c42e60f24abef3c50
    </div>
</div>

<div class="detail-container">

<<<<<<< HEAD
    <div class="detail-image">
        <img src="{{ $car->Image }}" alt="{{ $car->Brand }} {{ $car->Model }}">
    </div>

=======
    <!-- LEFT IMAGE -->
    <div class="detail-image">
        <img src="{{ $car->Image }}">
    </div>

    <!-- CENTER DETAILS -->
>>>>>>> 08b6d1334bbe4e4929c1ad5c42e60f24abef3c50
    <div class="detail-info">
        <h1>{{ $car->Brand }} {{ $car->Model }}</h1>

        <p class="desc">
            Experience luxury driving with premium comfort and performance.
        </p>

        <div class="specs">
            <div><strong>Year:</strong> {{ $car->Year }}</div>
<<<<<<< HEAD
            <div><strong>Plate Number:</strong> {{ $car->PlateNumber ?? 'N/A' }}</div>
            <div><strong>Transmission:</strong> {{ $car->Transmission }}</div>
            <div><strong>Fuel:</strong> {{ $car->FuelType }}</div>
            <div><strong>Seats:</strong> {{ $car->Seats }}</div>
            <div><strong>Status:</strong> {{ $car->Status ?? 'Available' }}</div>
=======
            <div><strong>Transmission:</strong> {{ $car->Transmission }}</div>
            <div><strong>Fuel:</strong> {{ $car->FuelType }}</div>
            <div><strong>Seats:</strong> {{ $car->Seats }}</div>
>>>>>>> 08b6d1334bbe4e4929c1ad5c42e60f24abef3c50
        </div>

        <h2 class="price">₱{{ number_format($car->PricePerDay, 2) }} / day</h2>
    </div>

<<<<<<< HEAD
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
=======
    <!-- RIGHT BOOKING PANEL -->
    <div class="booking-box">

        <h3>Book Your Car</h3>

        <form action="{{ route('book.store') }}" method="POST" class="booking-form">
    @csrf

    @if(session('success'))
    <div class="success-alert">
        {{ session('success') }}
    </div>
@endif

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
>>>>>>> 08b6d1334bbe4e4929c1ad5c42e60f24abef3c50

</div>

</body>
</html>
<!DOCTYPE html>
<html>
<head>
    @vite(['resources/css/app.css'])
</head>
<body>

<div class="navbar">
    <div class="logo">RENTGO</div>
    <div class="nav-links">
        <a href="/">Home</a>
        <a href="/cars">Cars</a>
    </div>
</div>

<div style="display:flex; padding:50px; gap:50px;">

    <img src="{{ $car->Image }}" class="car-detail-img">

    <div>
        <h1>{{ $car->Brand }} {{ $car->Model }}</h1>

        <p>Year: {{ $car->Year }}</p>
        <p>Transmission: {{ $car->Transmission }}</p>
        <p>Fuel: {{ $car->FuelType }}</p>
        <p>Seats: {{ $car->Seats }}</p>

        <h2>₱{{ $car->PricePerDay }}/day</h2>

        <button class="btn">Book Now</button>
    </div>

</div>

</body>
</html>
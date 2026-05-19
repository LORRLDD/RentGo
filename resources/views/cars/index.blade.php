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

<h2 class="section-title">Available Luxury Cars</h2>

<div class="grid">

@foreach($cars as $car)
    <div class="card">
        <img src="{{ $car->Image }}">

        <div class="card-content">
            <h3>{{ $car->Brand }} {{ $car->Model }}</h3>
            <p>₱{{ $car->PricePerDay }} / day</p>

            <a href="/cars/{{ $car->CarID }}" class="btn">View Details</a>
        </div>
    </div>
@endforeach

</div>

</body>
</html>
@extends('layouts.app')

@section('content')
<section class="cars-section">
    <div class="cars-header">
        <h1>All Cars</h1>
        <p>Choose the perfect car for your next journey.</p>
    </div>

    <div class="cars-grid">
        @foreach($cars as $car)
            <div class="car-card">
                <img src="{{ $car->Image }}" class="car-img">

                <div class="car-content">
                    <h2>{{ $car->Brand }} {{ $car->Model }}</h2>

                    <p class="car-price">
                        ₱{{ number_format($car->PricePerDay, 2) }}
                        <span>/ day</span>
                    </p>

                    <a href="{{ route('cars.show', $car->CarID) }}" class="details-btn">
                        View Details <span>→</span>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</section>
@endsection
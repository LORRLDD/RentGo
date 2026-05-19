@extends('layouts.rentgo')

@section('content')

<div class="max-w-7xl mx-auto px-6">

<!-- HERO -->
<section class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center py-10">

    <!-- LEFT -->
    <div>

        <h1 class="text-5xl font-black leading-tight text-slate-900">
            Drive Your Journey
            <span class="text-[#285ccc]">Your Way</span>
        </h1>

        <p class="mt-6 text-slate-600 text-lg leading-8 max-w-xl">
            Find the perfect vehicle for your next trip.
            Easy booking, premium experience, and modern convenience.
        </p>

        <!-- SEARCH BOX -->
        <div class="mt-10 bg-white rounded-3xl shadow-sm border border-slate-200 p-5">

            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">

                <input type="text" placeholder="Pick-up Location"
                    class="w-full rounded-xl border-slate-200 focus:ring-[#285ccc] focus:border-[#285ccc]">

                <input type="date"
                    class="w-full rounded-xl border-slate-200 focus:ring-[#285ccc] focus:border-[#285ccc]">

                <input type="date"
                    class="w-full rounded-xl border-slate-200 focus:ring-[#285ccc] focus:border-[#285ccc]">

                <button class="bg-[#285ccc] hover:bg-blue-700 text-white py-3 rounded-xl transition shadow-lg">
                    Search Cars
                </button>

            </div>

        </div>

    </div>

    <!-- RIGHT IMAGE FIXED -->
    <div class="flex justify-center">
        <div class="w-full h-[420px] rounded-[30px] overflow-hidden shadow-xl">
            <img
                src="https://images.unsplash.com/photo-1503376780353-7e6692767b70?q=80&w=2070&auto=format&fit=crop"
                class="w-full h-full object-cover"
            >
        </div>
    </div>

</section>

<!-- FEATURES -->
<section class="grid grid-cols-1 md:grid-cols-4 gap-6 mt-16">

    @foreach([
        ['Wide Selection', 'Choose from premium vehicles.'],
        ['Best Pricing', 'Affordable luxury rentals.'],
        ['Easy Booking', 'Fast and simple reservations.'],
        ['24/7 Support', 'Always ready to help you.']
    ] as $f)

    <div class="bg-white rounded-3xl p-6 border border-slate-200 hover:shadow-md transition">
        <h3 class="font-bold text-lg">{{ $f[0] }}</h3>
        <p class="text-slate-500 text-sm mt-2">{{ $f[1] }}</p>
    </div>

    @endforeach

</section>

<!-- POPULAR CARS -->
<section class="mt-20 pb-16">

    <div class="flex items-center justify-between mb-8">
        <h2 class="text-3xl font-black text-slate-900">
            Popular Cars
        </h2>

        <a href="#" class="text-[#285ccc] font-semibold">
            View All
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

        <!-- CARD TEMPLATE -->
        @foreach([
            ['Toyota Vios','Automatic • 5 Seats','₱1,500','https://images.unsplash.com/photo-1549399542-7e3f8b79c341?q=80&w=1974&auto=format&fit=crop'],
            ['Honda HR-V','SUV • Premium','₱2,200','https://images.unsplash.com/photo-1552519507-da3b142c6e3d?q=80&w=2070&auto=format&fit=crop'],
            ['Ford Ranger','Pickup • Luxury','₱2,800','https://images.unsplash.com/photo-1492144534655-ae79c964c9d7?q=80&w=1883&auto=format&fit=crop'],
            ['BMW X5','Executive SUV','₱4,500','https://images.unsplash.com/photo-1502877338535-766e1452684a?q=80&w=2072&auto=format&fit=crop']
        ] as $car)

        <div class="bg-white rounded-3xl border border-slate-200 overflow-hidden hover:shadow-xl transition">

            <!-- IMAGE FIXED (IMPORTANT PART) -->
            <div class="w-full h-48 overflow-hidden">
                <img src="{{ $car[3] }}"
                    class="w-full h-full object-cover">
            </div>

            <div class="p-5">

                <h3 class="font-bold text-lg">
                    {{ $car[0] }}
                </h3>

                <p class="text-slate-500 text-sm mt-1">
                    {{ $car[1] }}
                </p>

                <div class="flex items-center justify-between mt-5">

                    <h4 class="font-black text-[#285ccc] text-xl">
                        {{ $car[2] }}
                    </h4>

                    <button class="bg-slate-900 text-white px-4 py-2 rounded-xl hover:bg-[#285ccc] transition">
                        Rent
                    </button>

                </div>

            </div>

        </div>

        @endforeach

    </div>

</section>

</div>

@endsection
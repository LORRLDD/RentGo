<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RentGo</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-[#fff2bd] text-slate-800">

    <!-- NAVBAR -->
    <header class="w-full bg-white border-b border-slate-200">

        <div class="max-w-7xl mx-auto px-8 py-5 flex items-center justify-between">

            <!-- LOGO -->
            <div class="flex items-center gap-3">

                <div class="w-10 h-10 rounded-xl bg-[#285ccc] flex items-center justify-center text-white font-bold">
                    R
                </div>

                <div>
                    <h1 class="font-black text-xl text-slate-900">
                        RentGo
                    </h1>

                    <p class="text-xs text-slate-500 tracking-[3px] uppercase">
                        Car Rental
                    </p>
                </div>

            </div>

            <!-- MENU -->
            <nav class="hidden lg:flex items-center gap-10 text-sm font-medium">

                <a href="/" class="hover:text-[#285ccc] transition">
                    Home
                </a>

                <a href="/vehicles" class="hover:text-[#285ccc] transition">
                    Vehicles
                </a>

                <a href="/dashboard" class="hover:text-[#285ccc] transition">
                    Dashboard
                </a>

                <a href="#" class="hover:text-[#285ccc] transition">
                    Reservations
                </a>

            </nav>

            <!-- BUTTONS -->
            <div class="flex items-center gap-4">

                <a
                    href="/login"
                    class="px-5 py-2.5 rounded-xl border border-slate-300 hover:bg-slate-100 transition text-sm"
                >
                    Log In
                </a>

                <a
                    href="/register"
                    class="px-5 py-2.5 rounded-xl bg-[#285ccc] text-white hover:bg-blue-700 transition text-sm shadow-lg"
                >
                    Sign Up
                </a>

            </div>

        </div>

    </header>

    <!-- CONTENT -->
    <main class="max-w-7xl mx-auto px-8 py-10">

        @yield('content')

    </main>

</body>
</html>
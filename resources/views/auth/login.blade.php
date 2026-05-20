<!DOCTYPE html>
<html lang="en" class="h-full bg-black">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In - Car Rental</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="h-full flex items-center justify-center p-4 sm:p-6 lg:p-8 bg-black">

    <div class="flex w-full max-w-4xl bg-black rounded-2xl shadow-xl overflow-hidden min-h-[550px] border border-slate-800">
       
        <div class="relative hidden md:flex md:w-1/2 bg-slate-900 text-white p-12 flex-col justify-center">
            <img
                src="https://images.unsplash.com/photo-1506015391300-4802dc74de2e?auto=format&fit=crop&w=800&q=80"
                alt="Car driving along scenic coastal road"
                class="absolute inset-0 w-full h-full object-cover opacity-60 pointer-events-none"
            >

            <div class="relative z-10 max-w-sm">
                <h1 class="text-4xl font-bold tracking-tight mb-4 leading-tight">
                    Let's get you on the road.
                </h1>

                <p class="text-slate-200 text-base font-light leading-relaxed">
                    Log in to continue your car rental experience.
                </p>
            </div>
        </div>

        <div class="w-full md:w-1/2 p-8 sm:p-12 lg:p-16 flex flex-col justify-center bg-black">

            <div class="w-full max-w-md mx-auto">

                <div class="mb-8">
                    <h2 class="text-2xl font-bold text-white mb-1">
                        Welcome Back!
                    </h2>

                    <p class="text-sm text-slate-300">
                        Please login to your account
                    </p>
                </div>

                <form action="{{ route('login') }}" method="POST" class="space-y-5">
                    @csrf

                    <div>
                        <label for="email" class="block text-sm font-semibold text-slate-200 mb-2">
                            Email
                        </label>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="Enter your email"
                            required
                            autofocus
                            class="w-full px-4 py-3 border border-slate-700 rounded-lg text-white placeholder-slate-400 bg-slate-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 @error('email') border-red-500 @enderror"
                        >

                        @error('email')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <div class="flex justify-between items-center mb-2">

                            <label for="password" class="block text-sm font-semibold text-slate-200">
                                Password
                            </label>

                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-xs font-semibold text-blue-400 hover:underline">
                                    Forgot Password?
                                </a>
                            @endif
                        </div>

                        <div class="relative">

                            <input
                                type="password"
                                id="password"
                                name="password"
                                placeholder="Enter your password"
                                required
                                class="w-full px-4 py-3 border border-slate-700 rounded-lg text-white placeholder-slate-400 bg-slate-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 @error('password') border-red-500 @enderror"
                            >

                            <button type="button" class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-200 focus:outline-none">

                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">

                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />

                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />

                                </svg>
                            </button>
                        </div>

                        @error('password')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="pt-2">
                        <button
                            type="submit"
                            class="w-full bg-white text-black py-3 px-4 rounded-lg font-semibold hover:bg-slate-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-white transition duration-150 shadow-sm"
                        >
                            Log In
                        </button>
                    </div>

                </form>

                <div class="mt-8 text-center">

                    <p class="text-sm text-slate-300">
                        Don't have an account?

                        <a href="{{ route('register') }}" class="font-semibold text-blue-400 hover:underline">
                            Sign Up
                        </a>
                    </p>

                </div>

            </div>

        </div>

    </div>

</body>
</html>
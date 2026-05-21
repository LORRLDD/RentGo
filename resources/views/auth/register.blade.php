<!DOCTYPE html>
<html lang="en" class="h-full bg-black">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Car Rental</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="h-full flex items-center justify-center p-4 sm:p-6 lg:p-8 bg-black">

    <div class="flex w-full max-w-4xl bg-black rounded-2xl shadow-xl overflow-hidden min-h-[600px] border border-slate-800">
        
        <div class="relative hidden md:flex md:w-1/2 bg-slate-900 text-white p-12 flex-col justify-center">

            <img 
                src="https://images.unsplash.com/photo-1506015391300-4802dc74de2e?auto=format&fit=crop&w=800&q=80" 
                alt="Car driving along scenic coastal road" 
                class="absolute inset-0 w-full h-full object-cover opacity-60 pointer-events-none"
            >

            <div class="relative z-10 max-w-sm">

                <h1 class="text-4xl font-bold tracking-tight mb-4 leading-tight">
                    Ready to start your journey?
                </h1>

                <p class="text-slate-200 text-base font-light leading-relaxed">
                    Create your account in just a few steps and unlock premium access to fleets worldwide.
                </p>

            </div>
        </div>

        <div class="w-full md:w-1/2 p-8 sm:p-12 lg:p-16 flex flex-col justify-center bg-black">

            <div class="w-full max-w-md mx-auto">
                
                <div class="mb-6">

                    <h2 class="text-2xl font-bold text-white mb-1">
                        Create Account
                    </h2>

                    <p class="text-sm text-slate-300">
                        Please enter your details to register
                    </p>

                </div>

                <form action="{{ route('register') }}" method="POST" class="space-y-4">
                    @csrf

                    <div class="grid grid-cols-2 gap-4">

                        <div>
                            <label for="first_name" class="block text-sm font-semibold text-slate-200 mb-1">
                                First Name
                            </label>

                            <input 
                                type="text" 
                                id="first_name" 
                                name="first_name" 
                                value="{{ old('first_name') }}"
                                placeholder="First name" 
                                required 
                                autofocus
                                class="w-full px-4 py-2.5 border border-slate-700 rounded-lg text-white placeholder-slate-400 bg-slate-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 @error('first_name') border-red-500 @enderror"
                            >

                            @error('first_name')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="last_name" class="block text-sm font-semibold text-slate-200 mb-1">
                                Last Name
                            </label>

                            <input 
                                type="text" 
                                id="last_name" 
                                name="last_name" 
                                value="{{ old('last_name') }}"
                                placeholder="Last name" 
                                required 
                                class="w-full px-4 py-2.5 border border-slate-700 rounded-lg text-white placeholder-slate-400 bg-slate-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 @error('last_name') border-red-500 @enderror"
                            >

                            @error('last_name')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>

                    <div>
                        <label for="email" class="block text-sm font-semibold text-slate-200 mb-1">
                            Email
                        </label>

                        <input 
                            type="email" 
                            id="email" 
                            name="email" 
                            value="{{ old('email') }}"
                            placeholder="Enter your email" 
                            required 
                            class="w-full px-4 py-2.5 border border-slate-700 rounded-lg text-white placeholder-slate-400 bg-slate-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 @error('email') border-red-500 @enderror"
                        >

                        @error('email')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-semibold text-slate-200 mb-1">
                            Password
                        </label>

                        <input 
                            type="password" 
                            id="password" 
                            name="password" 
                            placeholder="Create a strong password" 
                            required
                            class="w-full px-4 py-2.5 border border-slate-700 rounded-lg text-white placeholder-slate-400 bg-slate-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 @error('password') border-red-500 @enderror"
                        >

                        @error('password')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-sm font-semibold text-slate-200 mb-1">
                            Confirm Password
                        </label>

                        <input 
                            type="password" 
                            id="password_confirmation" 
                            name="password_confirmation" 
                            placeholder="Repeat your password" 
                            required
                            class="w-full px-4 py-2.5 border border-slate-700 rounded-lg text-white placeholder-slate-400 bg-slate-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150"
                        >
                    </div>

                    <div class="pt-2">
                        <button 
                            type="submit" 
                            class="w-full bg-white text-black py-3 px-4 rounded-lg font-semibold hover:bg-slate-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-white transition duration-150 shadow-sm"
                        >
                            Sign Up
                        </button>
                    </div>

                </form>

                <div class="mt-6 text-center">

                    <p class="text-sm text-slate-300">
                        Already have an account? 

                        <a href="{{ route('login') }}" class="font-semibold text-blue-400 hover:underline">
                            Log In
                        </a>
                    </p>

                </div>

            </div>
        </div>

    </div>

</body>
</html>
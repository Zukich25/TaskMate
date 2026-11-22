@extends('layouts.guest')

@section('title', 'Sign In - TaskMate')

@section('content')
<div class="min-h-screen flex items-center justify-center p-4 sm:p-6 lg:p-8 bg-[#f4f7fb]">
    <!-- Outer Card Container -->
    <div class="w-full max-w-5xl bg-white rounded-3xl shadow-xl border border-slate-100 overflow-hidden grid grid-cols-1 lg:grid-cols-12 min-h-[640px]">
        
        <!-- Left Hero Branding Column -->
        <div class="lg:col-span-5 bg-gradient-to-br from-[#18345e] via-[#1e40af] to-[#315fe8] text-white p-8 sm:p-12 flex flex-col justify-between relative overflow-hidden">
            <!-- Decorative Orbit Curves -->
            <div class="absolute -right-16 -top-16 w-64 h-64 rounded-full border border-white/10 pointer-events-none"></div>
            <div class="absolute -right-32 -bottom-32 w-96 h-96 rounded-full border border-white/10 pointer-events-none"></div>
            
            <div class="relative z-10">
                <!-- App Logo -->
                <div class="flex items-center gap-3 mb-12">
                    <div class="w-10 h-10 rounded-xl bg-white/15 backdrop-blur-sm flex items-center justify-center border border-white/20">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <span class="text-2xl font-bold tracking-tight">TaskMate</span>
                </div>

                <!-- Catchphrase -->
                <h1 class="text-3xl sm:text-4xl font-bold tracking-tight leading-tight">
                    Make space<br>for what matters.
                </h1>
                <p class="mt-4 text-[#dce7ff] text-base leading-relaxed max-w-xs">
                    A calmer way to keep school tasks organized and on track.
                </p>
            </div>

            <!-- Motivational Card -->
            <div class="relative z-10 mt-8 p-6 bg-white/10 backdrop-blur-md rounded-2xl border border-white/15 shadow-sm">
                <span class="text-[11px] font-bold tracking-wider uppercase text-blue-200">Your week, in good hands</span>
                <h3 class="text-xl font-bold mt-1 text-white">Plan. Focus. Finish.</h3>
                <p class="text-sm text-blue-100/90 mt-1">Small steps make big progress.</p>
            </div>
        </div>

        <!-- Right Form Column -->
        <div class="lg:col-span-7 p-8 sm:p-12 lg:p-16 flex flex-col justify-center bg-white">
            <div class="max-w-md w-full mx-auto">
                <div class="mb-8">
                    <h2 class="text-2xl sm:text-3xl font-bold text-[#172b4d]">Welcome back</h2>
                    <p class="text-sm text-[#75849a] mt-1">Sign in to continue to your student workspace.</p>
                </div>

                @if(session('info'))
                    <div class="mb-6 p-4 rounded-xl bg-blue-50 border border-blue-200 text-sm text-blue-800">
                        {{ session('info') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="mb-6 p-4 rounded-xl bg-red-50 border border-red-200 text-sm text-red-700">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login.post') }}" class="space-y-5">
                    @csrf

                    <!-- Email Input -->
                    <div>
                        <label for="email" class="block text-xs font-bold uppercase tracking-wider text-[#536581] mb-2">
                            Email address
                        </label>
                        <div class="relative">
                            <input 
                                type="email" 
                                id="email" 
                                name="email" 
                                value="{{ old('email', 'Cabansay@gmail.com') }}" 
                                required 
                                autofocus
                                class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50/50 text-[#253858] text-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#315fe8] focus:border-transparent transition"
                                placeholder="name@domain.com"
                            >
                        </div>
                    </div>

                    <!-- Password Input -->
                    <div>
                        <div class="flex items-center justify-between mb-2">
                            <label for="password" class="block text-xs font-bold uppercase tracking-wider text-[#536581]">
                                Password
                            </label>
                            <a href="{{ route('password.request') }}" class="text-xs font-semibold text-[#315fe8] hover:underline">
                                Forgot password?
                            </a>
                        </div>
                        <input 
                            type="password" 
                            id="password" 
                            name="password" 
                            value="password"
                            required
                            class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50/50 text-[#253858] text-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#315fe8] focus:border-transparent transition"
                            placeholder="••••••••••"
                        >
                    </div>

                    <!-- Sign In Action Button -->
                    <button 
                        type="submit" 
                        class="w-full mt-2 py-3.5 px-4 rounded-xl bg-[#315fe8] hover:bg-[#254ec9] active:bg-[#1f40aa] text-white font-semibold text-sm shadow-md shadow-blue-500/20 transition duration-150 ease-in-out flex items-center justify-center gap-2"
                    >
                        <span>Sign In</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </button>
                </form>

                <!-- Create Account Link -->
                <p class="mt-8 text-center text-sm text-[#718098]">
                    Don't have an account? 
                    <a href="{{ route('register') }}" class="font-bold text-[#315fe8] hover:underline ml-1">
                        Create account
                    </a>
                </p>

                <!-- Quick HCI Demo Hint -->
                <div class="mt-6 pt-6 border-t border-slate-100 text-center">
                    <p class="text-xs text-slate-400">
                        Demo Account: <span class="text-slate-600 font-medium">Cabansay@gmail.com</span> • Password: <span class="text-slate-600 font-medium">password</span>
                    </p>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

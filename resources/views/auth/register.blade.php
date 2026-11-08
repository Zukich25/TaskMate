@extends('layouts.guest')

@section('title', 'Create Account - TaskMate')

@section('content')
<div class="min-h-screen flex items-center justify-center p-4 sm:p-6 lg:p-8 bg-[#f4f7fb]">
    <div class="w-full max-w-5xl bg-white rounded-3xl shadow-xl border border-slate-100 overflow-hidden grid grid-cols-1 lg:grid-cols-12 min-h-[640px]">
        
        <!-- Left Hero Branding -->
        <div class="lg:col-span-5 bg-gradient-to-br from-[#18345e] via-[#1e40af] to-[#315fe8] text-white p-8 sm:p-12 flex flex-col justify-between relative overflow-hidden">
            <div class="relative z-10">
                <div class="flex items-center gap-3 mb-12">
                    <div class="w-10 h-10 rounded-xl bg-white/15 backdrop-blur-sm flex items-center justify-center border border-white/20">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <span class="text-2xl font-bold tracking-tight">TaskMate</span>
                </div>

                <h1 class="text-3xl sm:text-4xl font-bold tracking-tight leading-tight">
                    Start your<br>organized journey.
                </h1>
                <p class="mt-4 text-[#dce7ff] text-base leading-relaxed">
                    Join thousands of college students keeping their school tasks, projects, and deadlines in harmony.
                </p>
            </div>

            <div class="relative z-10 mt-8 p-6 bg-white/10 backdrop-blur-md rounded-2xl border border-white/15 shadow-sm">
                <span class="text-[11px] font-bold tracking-wider uppercase text-blue-200">Built for college success</span>
                <h3 class="text-xl font-bold mt-1 text-white">Your study companion</h3>
                <p class="text-sm text-blue-100/90 mt-1">Simple to-do lists, timely reminders, zero clutter.</p>
            </div>
        </div>

        <!-- Right Form -->
        <div class="lg:col-span-7 p-8 sm:p-12 lg:p-16 flex flex-col justify-center bg-white">
            <div class="max-w-md w-full mx-auto">
                <div class="mb-8">
                    <h2 class="text-2xl sm:text-3xl font-bold text-[#172b4d]">Create account</h2>
                    <p class="text-sm text-[#75849a] mt-1">Set up your student profile in less than a minute.</p>
                </div>

                @if($errors->any())
                    <div class="mb-6 p-4 rounded-xl bg-red-50 border border-red-200 text-sm text-red-700">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form method="POST" action="{{ route('register.post') }}" class="space-y-4">
                    @csrf

                    <div>
                        <label for="name" class="block text-xs font-bold uppercase tracking-wider text-[#536581] mb-2">
                            Full Name
                        </label>
                        <input 
                            type="text" 
                            id="name" 
                            name="name" 
                            value="{{ old('name') }}" 
                            required 
                            autofocus
                            class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50/50 text-[#253858] text-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#315fe8] focus:border-transparent transition"
                            placeholder="Cabansay John Kenny C."
                        >
                    </div>

                    <div>
                        <label for="email" class="block text-xs font-bold uppercase tracking-wider text-[#536581] mb-2">
                            Email address
                        </label>
                        <input 
                            type="email" 
                            id="email" 
                            name="email" 
                            value="{{ old('email') }}" 
                            required 
                            class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50/50 text-[#253858] text-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#315fe8] focus:border-transparent transition"
                            placeholder="student@cpc.edu.ph"
                        >
                    </div>

                    <div>
                        <label for="password" class="block text-xs font-bold uppercase tracking-wider text-[#536581] mb-2">
                            Password
                        </label>
                        <input 
                            type="password" 
                            id="password" 
                            name="password" 
                            required 
                            class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50/50 text-[#253858] text-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#315fe8] focus:border-transparent transition"
                            placeholder="••••••••••"
                        >
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-xs font-bold uppercase tracking-wider text-[#536581] mb-2">
                            Confirm Password
                        </label>
                        <input 
                            type="password" 
                            id="password_confirmation" 
                            name="password_confirmation" 
                            required 
                            class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50/50 text-[#253858] text-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#315fe8] focus:border-transparent transition"
                            placeholder="••••••••••"
                        >
                    </div>

                    <button 
                        type="submit" 
                        class="w-full mt-2 py-3.5 px-4 rounded-xl bg-[#315fe8] hover:bg-[#254ec9] text-white font-semibold text-sm shadow-md shadow-blue-500/20 transition duration-150 flex items-center justify-center gap-2"
                    >
                        <span>Create Student Account</span>
                    </button>
                </form>

                <p class="mt-8 text-center text-sm text-[#718098]">
                    Already have an account? 
                    <a href="{{ route('login') }}" class="font-bold text-[#315fe8] hover:underline ml-1">
                        Sign In
                    </a>
                </p>
            </div>
        </div>

    </div>
</div>
@endsection

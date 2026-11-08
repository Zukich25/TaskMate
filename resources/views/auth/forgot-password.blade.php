@extends('layouts.guest')

@section('title', 'Forgot Password - TaskMate')

@section('content')
<div class="min-h-screen flex items-center justify-center p-4 sm:p-6 lg:p-8 bg-[#f4f7fb]">
    <div class="w-full max-w-md bg-white rounded-3xl shadow-xl border border-slate-100 p-8 sm:p-10">
        <!-- Logo -->
        <div class="flex items-center gap-3 mb-8 justify-center">
            <div class="w-10 h-10 rounded-xl bg-[#315fe8] flex items-center justify-center text-white shadow-md shadow-blue-500/20">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                </svg>
            </div>
            <span class="text-2xl font-bold tracking-tight text-[#18345e]">TaskMate</span>
        </div>

        <div class="text-center mb-8">
            <h2 class="text-2xl font-bold text-[#172b4d]">Reset your password</h2>
            <p class="text-sm text-[#75849a] mt-2">Enter your email and we'll send you recovery instructions.</p>
        </div>

        @if(session('status'))
            <div class="mb-6 p-4 rounded-xl bg-green-50 border border-green-200 text-sm text-green-700">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
            @csrf
            <div>
                <label for="email" class="block text-xs font-bold uppercase tracking-wider text-[#536581] mb-2">
                    Email address
                </label>
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    value="{{ old('email', 'Cabansay@gmail.com') }}" 
                    required 
                    autofocus
                    class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50/50 text-[#253858] text-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#315fe8] focus:border-transparent transition"
                    placeholder="student@cpc.edu.ph"
                >
            </div>

            <button 
                type="submit" 
                class="w-full py-3.5 px-4 rounded-xl bg-[#315fe8] hover:bg-[#254ec9] text-white font-semibold text-sm shadow-md shadow-blue-500/20 transition duration-150 flex items-center justify-center"
            >
                Send Reset Instructions
            </button>
        </form>

        <div class="mt-8 text-center">
            <a href="{{ route('login') }}" class="inline-flex items-center gap-1.5 text-sm font-semibold text-[#315fe8] hover:underline">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                <span>Back to sign in</span>
            </a>
        </div>
    </div>
</div>
@endsection

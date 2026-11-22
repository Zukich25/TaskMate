@extends('layouts.app')

@section('title', 'Profile & Settings - TaskMate')
@section('breadcrumb', 'Profile & Settings')
@section('page_title', 'Profile & Settings')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">

    <div>
        <p class="text-sm font-medium text-[#71819a]">
            Manage your student profile, academic information, and preferences.
        </p>
    </div>

    <!-- Student Profile Information Card -->
    <div class="bg-white rounded-3xl p-6 sm:p-10 border border-slate-200/80 shadow-sm space-y-8">
        
        <!-- Avatar & Name Header -->
        <div class="flex items-center gap-5 pb-6 border-b border-slate-100">
            <div class="w-16 h-16 rounded-3xl bg-gradient-to-br from-[#315fe8] to-[#18345e] text-white text-2xl font-bold flex items-center justify-center shadow-md shadow-blue-500/20">
                {{ strtoupper(substr($user->name ?? 'J', 0, 1)) }}
            </div>
            <div>
                <h2 class="text-xl sm:text-2xl font-bold text-[#172b4d]">
                    {{ $user->name ?? 'Cabansay John Kenny C.' }}
                </h2>
                <p class="text-xs sm:text-sm text-[#71819a]">
                    Cordova Public College • 3rd Year BSIT Student
                </p>
            </div>
        </div>

        <!-- Academic & Account Details Form -->
        <form action="{{ route('profile.update') }}" method="POST" class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <!-- Name -->
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-[#536581] mb-2">
                        Student Full Name
                    </label>
                    <input 
                        type="text" 
                        name="name" 
                        value="{{ old('name', $user->name ?? 'Cabansay John Kenny C.') }}" 
                        required
                        class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50/50 text-sm text-[#253858] focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#315fe8] transition"
                    >
                </div>

                <!-- Email (Read-only) -->
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-[#536581] mb-2">
                        Email Address
                    </label>
                    <input 
                        type="email" 
                        value="{{ $user->email ?? 'Cabansay@gmail.com' }}" 
                        disabled 
                        class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-100 text-sm text-slate-500 cursor-not-allowed"
                    >
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                <!-- Institution -->
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-[#536581] mb-2">
                        Institution
                    </label>
                    <input 
                        type="text" 
                        value="Cordova Public College" 
                        disabled 
                        class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-100 text-sm text-slate-600"
                    >
                </div>

                <!-- Degree Program -->
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-[#536581] mb-2">
                        Degree Program
                    </label>
                    <input 
                        type="text" 
                        value="BS in Information Technology" 
                        disabled 
                        class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-100 text-sm text-slate-600"
                    >
                </div>

                <!-- Year Level -->
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-[#536581] mb-2">
                        Year Level
                    </label>
                    <input 
                        type="text" 
                        value="3rd Year – Section A" 
                        disabled 
                        class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-100 text-sm text-slate-600"
                    >
                </div>
            </div>

            <!-- Workspace Preferences -->
            <div class="pt-6 border-t border-slate-100 space-y-4">
                <h3 class="text-sm font-bold text-[#172b4d]">Workspace Preferences</h3>
                
                <div class="flex items-center justify-between p-4 rounded-2xl bg-slate-50/60 border border-slate-100">
                    <div>
                        <p class="text-xs font-bold text-[#253858]">Desktop Push Notifications</p>
                        <p class="text-[11px] text-[#8291a8]">Alert me before tasks are due.</p>
                    </div>
                    <input type="checkbox" checked class="w-4 h-4 text-[#315fe8] rounded border-slate-300 focus:ring-[#315fe8]">
                </div>

                <div class="flex items-center justify-between p-4 rounded-2xl bg-slate-50/60 border border-slate-100">
                    <div>
                        <p class="text-xs font-bold text-[#253858]">Auto-sort by Priority</p>
                        <p class="text-[11px] text-[#8291a8]">Show High priority tasks on top of the list.</p>
                    </div>
                    <input type="checkbox" checked class="w-4 h-4 text-[#315fe8] rounded border-slate-300 focus:ring-[#315fe8]">
                </div>
            </div>

            <div class="pt-4 flex items-center justify-end">
                <button 
                    type="submit" 
                    class="px-6 py-2.5 rounded-xl bg-[#315fe8] hover:bg-[#254ec9] text-white font-bold text-xs shadow-md shadow-blue-500/20 transition"
                >
                    Save Changes
                </button>
            </div>
        </form>

    </div>
</div>
@endsection

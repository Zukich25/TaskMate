@extends('layouts.app')

@section('title', 'Dashboard - TaskMate')
@section('breadcrumb', 'Dashboard')
@section('page_title', 'Dashboard')

@section('content')
<div class="max-w-7xl mx-auto space-y-6">

    <!-- Greeting Subtext -->
    <div>
        <p class="text-sm font-medium text-[#61738e]">
            Good morning, {{ Auth::user()->name ?? 'John' }} 👋
        </p>
    </div>

    <!-- Hero Motivational Banner (Matches Figma 2_Dashboard 1 Hero) -->
    <div class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-[#18345e] via-[#1e40af] to-[#315fe8] text-white p-6 sm:p-8 lg:p-10 shadow-lg shadow-blue-900/10">
        <!-- Background subtle accent shapes -->
        <div class="absolute -right-10 -bottom-10 w-48 h-48 rounded-full bg-white/5 pointer-events-none"></div>
        <div class="absolute right-32 -top-12 w-64 h-64 rounded-full bg-white/5 pointer-events-none"></div>

        <div class="relative z-10 flex flex-col md:flex-row md:items-center justify-between gap-6">
            <div class="max-w-xl">
                <h2 class="text-2xl sm:text-3xl font-bold tracking-tight">
                    You’ve got this.
                </h2>
                <p class="mt-2 text-[#dce7ff] text-sm sm:text-base">
                    A little progress today goes a long way. Stay focused on your top priority tasks.
                </p>
                <div class="mt-6">
                    <a 
                        href="{{ route('tasks.create') }}" 
                        class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-white text-[#315fe8] hover:bg-blue-50 font-bold text-sm shadow-md transition"
                    >
                        <span>＋</span>
                        <span>Add a task</span>
                    </a>
                </div>
            </div>

            <!-- "TODAY" Stat Pill from Figma -->
            <div class="bg-white/10 backdrop-blur-md border border-white/20 rounded-2xl p-5 sm:p-6 text-center md:text-left min-w-[200px]">
                <span class="text-[11px] font-bold tracking-wider uppercase text-blue-200 block">
                    Today
                </span>
                <span class="text-2xl sm:text-3xl font-bold text-white mt-1 block">
                    {{ $todayTasksCount }} tasks due
                </span>
                <span class="text-xs text-blue-100/80 mt-1 block">
                    Keep up the great momentum!
                </span>
            </div>
        </div>
    </div>

    <!-- 3 Stat Metrics Cards (Matches Figma Dashboard Stat Cards) -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 sm:gap-6">
        <!-- Card 1: Total Tasks -->
        <div class="bg-white rounded-2xl p-6 border border-slate-200/80 shadow-sm flex items-center justify-between hover:shadow-md transition">
            <div>
                <p class="text-xs font-bold uppercase tracking-wider text-[#71819a]">Total tasks</p>
                <p class="text-3xl font-bold text-[#172b4d] mt-2">{{ str_pad($totalTasks, 2, '0', STR_PAD_LEFT) }}</p>
                <a href="{{ route('tasks.index') }}" class="text-xs text-[#315fe8] font-semibold mt-2 inline-block hover:underline">
                    Browse all tasks &rarr;
                </a>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-blue-50 text-[#315fe8] flex items-center justify-center font-bold text-xl">
                ✓
            </div>
        </div>

        <!-- Card 2: In Progress -->
        <div class="bg-white rounded-2xl p-6 border border-slate-200/80 shadow-sm flex items-center justify-between hover:shadow-md transition">
            <div>
                <p class="text-xs font-bold uppercase tracking-wider text-[#71819a]">In progress</p>
                <p class="text-3xl font-bold text-[#172b4d] mt-2">{{ str_pad($inProgressCount, 2, '0', STR_PAD_LEFT) }}</p>
                <a href="{{ route('tasks.index', ['filter' => 'in_progress']) }}" class="text-xs text-emerald-600 font-semibold mt-2 inline-block hover:underline">
                    View active tasks &rarr;
                </a>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center font-bold text-xl">
                ◷
            </div>
        </div>

        <!-- Card 3: Completed -->
        <div class="bg-white rounded-2xl p-6 border border-slate-200/80 shadow-sm flex items-center justify-between hover:shadow-md transition">
            <div>
                <p class="text-xs font-bold uppercase tracking-wider text-[#71819a]">Completed</p>
                <p class="text-3xl font-bold text-[#172b4d] mt-2">{{ str_pad($completedCount, 2, '0', STR_PAD_LEFT) }}</p>
                <a href="{{ route('tasks.index', ['filter' => 'completed']) }}" class="text-xs text-blue-600 font-semibold mt-2 inline-block hover:underline">
                    View completed &rarr;
                </a>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-blue-50 text-[#315fe8] flex items-center justify-center font-bold text-xl">
                ✓
            </div>
        </div>
    </div>

    <!-- Upcoming Tasks Section (Matches Figma 2_Dashboard 1 Upcoming Section) -->
    <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200/80 shadow-sm">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h3 class="text-lg font-bold text-[#172b4d]">Upcoming tasks</h3>
                <p class="text-xs text-[#71819a] mt-0.5">Tasks scheduled for today and this week.</p>
            </div>
            <a href="{{ route('tasks.index') }}" class="text-xs font-bold text-[#315fe8] hover:underline flex items-center gap-1">
                <span>View all</span>
                <span>&rarr;</span>
            </a>
        </div>

        <!-- Tasks List Rows -->
        @if($upcomingTasks->count() > 0)
            <div class="divide-y divide-slate-100">
                @foreach($upcomingTasks as $task)
                    <div class="py-4 flex flex-col sm:flex-row sm:items-center justify-between gap-4 hover:bg-slate-50/60 rounded-xl px-3 -mx-3 transition">
                        <!-- Checkbox & Info -->
                        <div class="flex items-start gap-3 min-w-0">
                            <!-- Toggle Complete Form -->
                            <form action="{{ route('tasks.toggle', $task) }}" method="POST" class="mt-0.5">
                                @csrf
                                @method('PATCH')
                                <button 
                                    type="submit" 
                                    class="w-5 h-5 rounded-md border {{ $task->status === 'Completed' ? 'bg-[#315fe8] border-[#315fe8] text-white' : 'border-slate-300 bg-white hover:border-[#315fe8]' }} flex items-center justify-center transition"
                                    title="Toggle complete"
                                >
                                    @if($task->status === 'Completed')
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                                        </svg>
                                    @endif
                                </button>
                            </form>

                            <div class="min-w-0">
                                <a href="{{ route('tasks.show', $task) }}" class="text-sm font-bold text-[#243858] hover:text-[#315fe8] transition block truncate">
                                    {{ $task->title }}
                                </a>
                                <p class="text-xs text-[#8291a8] mt-0.5">
                                    {{ $task->course ?? 'General Coursework' }}
                                </p>
                            </div>
                        </div>

                        <!-- Metadata Badges & Action -->
                        <div class="flex items-center gap-3 sm:gap-4 shrink-0 self-end sm:self-auto">
                            <!-- Due Date -->
                            <span class="text-xs font-medium text-[#536581]">
                                {{ $task->formatted_due_date }}
                            </span>

                            <!-- Status Badge -->
                            @if($task->status === 'In progress')
                                <span class="px-2.5 py-1 rounded-full text-[11px] font-bold bg-[#e8f7f0] text-[#2b8a61]">
                                    In progress
                                </span>
                            @elseif($task->status === 'Pending')
                                <span class="px-2.5 py-1 rounded-full text-[11px] font-bold bg-[#fef6e7] text-[#a66a13]">
                                    Pending
                                </span>
                            @else
                                <span class="px-2.5 py-1 rounded-full text-[11px] font-bold bg-blue-50 text-[#315fe8]">
                                    Completed
                                </span>
                            @endif

                            <!-- Priority Badge -->
                            @if($task->priority === 'High')
                                <span class="text-xs font-bold text-rose-600">High</span>
                            @elseif($task->priority === 'Medium')
                                <span class="text-xs font-medium text-amber-600">Medium</span>
                            @else
                                <span class="text-xs font-medium text-slate-500">Low</span>
                            @endif

                            <!-- Open Action -->
                            <a href="{{ route('tasks.show', $task) }}" class="text-xs font-bold text-[#315fe8] hover:underline pl-2">
                                Open
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <!-- Zero State (Figma 15_Empty Tasks 1) -->
            <div class="text-center py-12">
                <div class="w-16 h-16 mx-auto rounded-full bg-blue-50 text-[#315fe8] flex items-center justify-center font-bold text-2xl mb-3">
                    ✓
                </div>
                <h4 class="text-base font-bold text-[#172b4d]">You are all caught up!</h4>
                <p class="text-xs text-[#71819a] mt-1 max-w-sm mx-auto">No pending tasks for today. Add a new coursework task or take a study break.</p>
                <a href="{{ route('tasks.create') }}" class="mt-4 inline-flex items-center gap-1.5 px-4 py-2 rounded-xl bg-[#315fe8] text-white text-xs font-bold shadow-sm hover:bg-blue-700 transition">
                    <span>＋ Add a task</span>
                </a>
            </div>
        @endif
    </div>

</div>
@endsection

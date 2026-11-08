@extends('layouts.app')

@section('title', 'My Tasks - TaskMate')
@section('breadcrumb', 'My Tasks')
@section('page_title', 'My Tasks')

@section('content')
<div class="max-w-7xl mx-auto space-y-6">

    <!-- Subtitle -->
    <div>
        <p class="text-sm font-medium text-[#71819a]">
            All your schoolwork in one place.
        </p>
    </div>

    <!-- Filter & Action Controls Bar (Matches Figma 3_My Tasks 1 Controls) -->
    <div class="bg-white rounded-3xl p-4 sm:p-6 border border-slate-200/80 shadow-sm flex flex-col md:flex-row md:items-center justify-between gap-4">
        
        <!-- Search Input -->
        <form action="{{ route('tasks.index') }}" method="GET" class="relative flex-1 max-w-md">
            <input type="hidden" name="filter" value="{{ $filter }}">
            <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-[#8492a6]">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
            </span>
            <input 
                type="text" 
                name="search" 
                value="{{ request('search') }}" 
                placeholder="Search tasks..." 
                class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-slate-200 bg-slate-50 text-xs sm:text-sm text-[#253858] placeholder-[#8492a6] focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#315fe8] focus:border-transparent transition"
            >
        </form>

        <!-- Status Filter Tabs (All / Pending / Completed) -->
        <div class="flex items-center gap-1 sm:gap-2 overflow-x-auto pb-1 md:pb-0">
            <!-- All Tab -->
            <a 
                href="{{ route('tasks.index', array_merge(request()->except('filter', 'page'), ['filter' => 'all'])) }}" 
                class="px-4 py-2 rounded-xl text-xs sm:text-sm font-bold transition shrink-0 {{ $filter === 'all' ? 'bg-blue-50 text-[#315fe8]' : 'text-[#71819a] hover:bg-slate-50' }}"
            >
                All {{ $totalCount }}
            </a>

            <!-- Pending Tab -->
            <a 
                href="{{ route('tasks.index', array_merge(request()->except('filter', 'page'), ['filter' => 'pending'])) }}" 
                class="px-4 py-2 rounded-xl text-xs sm:text-sm font-bold transition shrink-0 {{ $filter === 'pending' ? 'bg-amber-50 text-amber-700' : 'text-[#71819a] hover:bg-slate-50' }}"
            >
                Pending {{ $pendingCount }}
            </a>

            <!-- In Progress Tab -->
            <a 
                href="{{ route('tasks.index', array_merge(request()->except('filter', 'page'), ['filter' => 'in_progress'])) }}" 
                class="px-4 py-2 rounded-xl text-xs sm:text-sm font-bold transition shrink-0 {{ $filter === 'in_progress' ? 'bg-emerald-50 text-emerald-700' : 'text-[#71819a] hover:bg-slate-50' }}"
            >
                In progress {{ $inProgressCount }}
            </a>

            <!-- Completed Tab -->
            <a 
                href="{{ route('tasks.index', array_merge(request()->except('filter', 'page'), ['filter' => 'completed'])) }}" 
                class="px-4 py-2 rounded-xl text-xs sm:text-sm font-bold transition shrink-0 {{ $filter === 'completed' ? 'bg-blue-50 text-[#315fe8]' : 'text-[#71819a] hover:bg-slate-50' }}"
            >
                Completed {{ $completedCount }}
            </a>
        </div>

        <!-- Add Task CTA Button -->
        <div class="shrink-0">
            <a 
                href="{{ route('tasks.create') }}" 
                class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-5 py-2.5 rounded-xl bg-[#315fe8] hover:bg-[#254ec9] active:bg-[#1f40aa] text-white text-xs sm:text-sm font-bold shadow-md shadow-blue-500/20 transition"
            >
                <span>＋</span>
                <span>Add task</span>
            </a>
        </div>
    </div>

    <!-- Tasks Management Table Card (Matches Figma Table Design) -->
    <div class="bg-white rounded-3xl border border-slate-200/80 shadow-sm overflow-hidden">
        @if($tasks->count() > 0)
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b border-slate-100 bg-slate-50/50 text-[11px] font-bold uppercase tracking-wider text-[#8a98ab]">
                            <th class="py-4 px-6">Task</th>
                            <th class="py-4 px-6">Due date</th>
                            <th class="py-4 px-6">Status</th>
                            <th class="py-4 px-6">Priority</th>
                            <th class="py-4 px-6 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 text-sm">
                        @foreach($tasks as $task)
                            <tr class="hover:bg-slate-50/60 transition group">
                                <!-- Task Column (Checkbox, Title, Course) -->
                                <td class="py-4 px-6">
                                    <div class="flex items-start gap-3">
                                        <!-- Quick Status Toggle -->
                                        <form action="{{ route('tasks.toggle', $task) }}" method="POST" class="mt-0.5">
                                            @csrf
                                            @method('PATCH')
                                            <button 
                                                type="submit" 
                                                class="w-5 h-5 rounded-md border {{ $task->status === 'Completed' ? 'bg-[#315fe8] border-[#315fe8] text-white' : 'border-slate-300 bg-white hover:border-[#315fe8]' }} flex items-center justify-center transition"
                                                title="Mark as {{ $task->status === 'Completed' ? 'Pending' : 'Completed' }}"
                                            >
                                                @if($task->status === 'Completed')
                                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                                                    </svg>
                                                @endif
                                            </button>
                                        </form>

                                        <div class="min-w-0">
                                            <a 
                                                href="{{ route('tasks.show', $task) }}" 
                                                class="font-bold text-[#243858] hover:text-[#315fe8] transition block {{ $task->status === 'Completed' ? 'line-through text-slate-400' : '' }}"
                                            >
                                                {{ $task->title }}
                                            </a>
                                            <p class="text-xs text-[#8291a8] mt-0.5">
                                                {{ $task->course ?? 'General' }}
                                            </p>
                                        </div>
                                    </div>
                                </td>

                                <!-- Due Date Column -->
                                <td class="py-4 px-6 whitespace-nowrap text-xs text-[#536581]">
                                    {{ $task->formatted_due_date }}
                                </td>

                                <!-- Status Column Badge -->
                                <td class="py-4 px-6 whitespace-nowrap">
                                    @if($task->status === 'In progress')
                                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-bold bg-[#e8f7f0] text-[#2b8a61]">
                                            In progress
                                        </span>
                                    @elseif($task->status === 'Pending')
                                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-bold bg-[#fef6e7] text-[#a66a13]">
                                            Pending
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-bold bg-blue-50 text-[#315fe8]">
                                            Completed
                                        </span>
                                    @endif
                                </td>

                                <!-- Priority Column Badge -->
                                <td class="py-4 px-6 whitespace-nowrap">
                                    @if($task->priority === 'High')
                                        <span class="inline-flex items-center gap-1 text-xs font-bold text-rose-600">
                                            <span class="w-1.5 h-1.5 rounded-full bg-rose-500"></span>
                                            High
                                        </span>
                                    @elseif($task->priority === 'Medium')
                                        <span class="inline-flex items-center gap-1 text-xs font-medium text-amber-600">
                                            <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span>
                                            Medium
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1 text-xs font-medium text-slate-500">
                                            <span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span>
                                            Low
                                        </span>
                                    @endif
                                </td>

                                <!-- Action Buttons (Open, Edit, Delete) -->
                                <td class="py-4 px-6 whitespace-nowrap text-right">
                                    <div class="flex items-center justify-end gap-3 text-xs">
                                        <!-- Open Details Link -->
                                        <a href="{{ route('tasks.show', $task) }}" class="font-bold text-[#315fe8] hover:underline">
                                            Open
                                        </a>

                                        <!-- Edit Link -->
                                        <a href="{{ route('tasks.edit', $task) }}" class="text-[#536581] hover:text-[#18345e] font-medium">
                                            Edit
                                        </a>

                                        <!-- Delete Form -->
                                        <form action="{{ route('tasks.destroy', $task) }}" method="POST" onsubmit="return confirm('Delete this task?');" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-rose-500 hover:text-rose-700 font-medium">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <!-- Zero State (Figma 15_Empty Tasks 1) -->
            <div class="text-center py-16 px-4">
                <div class="w-20 h-20 mx-auto rounded-3xl bg-blue-50 text-[#315fe8] flex items-center justify-center font-bold text-3xl mb-4 border border-blue-100 shadow-sm">
                    ▤
                </div>
                <h3 class="text-lg font-bold text-[#172b4d]">No tasks found</h3>
                <p class="text-xs sm:text-sm text-[#71819a] mt-1 max-w-sm mx-auto">
                    {{ request('search') ? 'No tasks matched "' . request('search') . '". Try searching with another term.' : 'There are no tasks under this category yet.' }}
                </p>
                <div class="mt-6 flex items-center justify-center gap-3">
                    @if(request('search') || request('filter') !== 'all')
                        <a href="{{ route('tasks.index') }}" class="px-4 py-2 rounded-xl bg-slate-100 text-[#536581] text-xs font-semibold hover:bg-slate-200 transition">
                            Clear filters
                        </a>
                    @endif
                    <a href="{{ route('tasks.create') }}" class="px-5 py-2.5 rounded-xl bg-[#315fe8] text-white text-xs font-bold shadow-md shadow-blue-500/20 hover:bg-[#254ec9] transition">
                        ＋ Add task
                    </a>
                </div>
            </div>
        @endif
    </div>

</div>
@endsection

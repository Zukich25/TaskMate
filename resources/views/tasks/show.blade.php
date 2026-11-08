@extends('layouts.app')

@section('title', $task->title . ' - Task Details')
@section('breadcrumb', 'Task Details')
@section('page_title', 'Task Details')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">

    <!-- Back to tasks link -->
    <div>
        <a href="{{ route('tasks.index') }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-[#315fe8] hover:underline">
            <span>&larr;</span>
            <span>Back to My Tasks</span>
        </a>
    </div>

    <!-- Details Card (Figma 6_Task Details 1) -->
    <div class="bg-white rounded-3xl p-6 sm:p-10 border border-slate-200/80 shadow-sm space-y-8">
        
        <!-- Header & Status Toggle -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-6 border-b border-slate-100">
            <div>
                <span class="text-xs font-bold uppercase tracking-wider text-[#91a0b5]">
                    {{ $task->course ?? 'General Coursework' }}
                </span>
                <h2 class="text-2xl sm:text-3xl font-bold text-[#172b4d] mt-1 {{ $task->status === 'Completed' ? 'line-through text-slate-400' : '' }}">
                    {{ $task->title }}
                </h2>
            </div>

            <!-- Quick Status Change Button -->
            <form action="{{ route('tasks.toggle', $task) }}" method="POST">
                @csrf
                @method('PATCH')
                <button 
                    type="submit" 
                    class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl border {{ $task->status === 'Completed' ? 'border-blue-200 bg-blue-50 text-[#315fe8]' : 'border-emerald-200 bg-emerald-50 text-emerald-700' }} text-xs font-bold hover:shadow-sm transition"
                >
                    <span>{{ $task->status === 'Completed' ? 'Mark as Pending' : '✓ Mark as Completed' }}</span>
                </button>
            </form>
        </div>

        <!-- Metadata Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 p-6 rounded-2xl bg-slate-50/70 border border-slate-100">
            <!-- Due Date -->
            <div>
                <p class="text-xs font-bold uppercase tracking-wider text-[#71819a]">Due date</p>
                <p class="text-sm font-semibold text-[#253858] mt-1.5">{{ $task->formatted_due_date }}</p>
            </div>

            <!-- Status -->
            <div>
                <p class="text-xs font-bold uppercase tracking-wider text-[#71819a]">Status</p>
                <div class="mt-1.5">
                    @if($task->status === 'In progress')
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-[#e8f7f0] text-[#2b8a61]">
                            In progress
                        </span>
                    @elseif($task->status === 'Pending')
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-[#fef6e7] text-[#a66a13]">
                            Pending
                        </span>
                    @else
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-blue-50 text-[#315fe8]">
                            Completed
                        </span>
                    @endif
                </div>
            </div>

            <!-- Priority -->
            <div>
                <p class="text-xs font-bold uppercase tracking-wider text-[#71819a]">Priority level</p>
                <div class="mt-1.5">
                    @if($task->priority === 'High')
                        <span class="inline-flex items-center gap-1.5 text-xs font-bold text-rose-600">
                            <span class="w-2 h-2 rounded-full bg-rose-500"></span>
                            High Priority
                        </span>
                    @elseif($task->priority === 'Medium')
                        <span class="inline-flex items-center gap-1.5 text-xs font-semibold text-amber-600">
                            <span class="w-2 h-2 rounded-full bg-amber-500"></span>
                            Medium Priority
                        </span>
                    @else
                        <span class="inline-flex items-center gap-1.5 text-xs font-medium text-slate-500">
                            <span class="w-2 h-2 rounded-full bg-slate-400"></span>
                            Low Priority
                        </span>
                    @endif
                </div>
            </div>
        </div>

        <!-- Description / Notes -->
        <div>
            <h4 class="text-xs font-bold uppercase tracking-wider text-[#536581] mb-3">
                Notes & Instructions
            </h4>
            <div class="p-5 rounded-2xl bg-white border border-slate-200 text-sm text-[#253858] leading-relaxed min-h-[100px]">
                @if($task->description)
                    {{ $task->description }}
                @else
                    <span class="text-slate-400 italic">No extra notes recorded for this task.</span>
                @endif
            </div>
        </div>

        <!-- Actions Footer -->
        <div class="pt-6 border-t border-slate-100 flex items-center justify-between">
            <form action="{{ route('tasks.destroy', $task) }}" method="POST" onsubmit="return confirm('Delete this task?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-xs font-bold text-rose-600 hover:text-rose-800 transition">
                    Delete Task
                </button>
            </form>

            <div class="flex items-center gap-3">
                <a 
                    href="{{ route('tasks.index') }}" 
                    class="px-5 py-2.5 rounded-xl border border-slate-200 text-[#536581] font-bold text-xs hover:bg-slate-50 transition"
                >
                    Close
                </a>
                <a 
                    href="{{ route('tasks.edit', $task) }}" 
                    class="px-5 py-2.5 rounded-xl bg-[#315fe8] hover:bg-[#254ec9] text-white font-bold text-xs shadow-sm transition"
                >
                    Edit Task
                </a>
            </div>
        </div>

    </div>
</div>
@endsection

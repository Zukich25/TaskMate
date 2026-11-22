@extends('layouts.app')

@section('title', 'Notifications - TaskMate')
@section('breadcrumb', 'Notifications')
@section('page_title', 'Notifications')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">

    <div>
        <p class="text-sm font-medium text-[#71819a]">
            Reminders and alerts for your coursework deadlines.
        </p>
    </div>

    <!-- Upcoming Tasks Notifications List -->
    <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200/80 shadow-sm space-y-4">
        <h3 class="text-base font-bold text-[#172b4d] mb-4">Upcoming Due Dates</h3>

        @if($upcomingTasks->count() > 0)
            <div class="space-y-3">
                @foreach($upcomingTasks as $task)
                    <div class="p-4 rounded-2xl border {{ $task->priority === 'High' ? 'border-rose-100 bg-rose-50/40' : 'border-slate-100 bg-slate-50/50' }} flex items-start gap-4 transition hover:bg-slate-50">
                        <!-- Icon -->
                        <div class="w-10 h-10 rounded-xl {{ $task->priority === 'High' ? 'bg-rose-100 text-rose-600' : 'bg-blue-100 text-[#315fe8]' }} flex items-center justify-center shrink-0 font-bold">
                            @if($task->priority === 'High')
                                !
                            @else
                                ◷
                            @endif
                        </div>

                        <!-- Content -->
                        <div class="flex-1 min-w-0">
                            <div class="flex items-center justify-between gap-2">
                                <h4 class="text-sm font-bold text-[#243858] truncate">
                                    {{ $task->title }}
                                </h4>
                                <span class="text-xs font-semibold text-[#315fe8] shrink-0">
                                    {{ $task->formatted_due_date }}
                                </span>
                            </div>
                            <p class="text-xs text-[#8291a8] mt-1">
                                Course: {{ $task->course ?? 'General' }} • Priority: {{ $task->priority }}
                            </p>
                        </div>

                        <!-- Action -->
                        <a href="{{ route('tasks.show', $task) }}" class="text-xs font-bold text-[#315fe8] hover:underline shrink-0">
                            View
                        </a>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-12 text-[#71819a]">
                <p class="text-sm">No new notifications right now. Everything is on schedule!</p>
            </div>
        @endif
    </div>

</div>
@endsection

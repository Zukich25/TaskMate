@extends('layouts.app')

@section('title', 'Edit Task - TaskMate')
@section('breadcrumb', 'Edit Task')
@section('page_title', 'Edit Task')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">

    <div>
        <p class="text-sm font-medium text-[#71819a]">
            Update task details, schedule, or priority status.
        </p>
    </div>

    <!-- Edit Form Card (Figma 8_Edit Task 1) -->
    <div class="bg-white rounded-3xl p-6 sm:p-10 border border-slate-200/80 shadow-sm">
        
        @if($errors->any())
            <div class="mb-6 p-4 rounded-2xl bg-red-50 border border-red-200 text-sm text-red-700">
                <p class="font-bold mb-1">Please correct the following errors:</p>
                <ul class="list-disc pl-5 space-y-1">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('tasks.update', $task) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Title -->
            <div>
                <label for="title" class="block text-xs font-bold uppercase tracking-wider text-[#536581] mb-2">
                    Task title <span class="text-rose-500">*</span>
                </label>
                <input 
                    type="text" 
                    id="title" 
                    name="title" 
                    value="{{ old('title', $task->title) }}" 
                    required 
                    class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50/50 text-sm text-[#253858] focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#315fe8] focus:border-transparent transition"
                >
            </div>

            <!-- Course/Subject & Due Date -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label for="course" class="block text-xs font-bold uppercase tracking-wider text-[#536581] mb-2">
                        Course or subject
                    </label>
                    <input 
                        type="text" 
                        id="course" 
                        name="course" 
                        value="{{ old('course', $task->course) }}" 
                        class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50/50 text-sm text-[#253858] focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#315fe8] focus:border-transparent transition"
                    >
                </div>

                <div>
                    <label for="due_date" class="block text-xs font-bold uppercase tracking-wider text-[#536581] mb-2">
                        Due date
                    </label>
                    <input 
                        type="date" 
                        id="due_date" 
                        name="due_date" 
                        value="{{ old('due_date', $task->due_date ? $task->due_date->format('Y-m-d') : '') }}" 
                        class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50/50 text-sm text-[#253858] focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#315fe8] focus:border-transparent transition"
                    >
                </div>
            </div>

            <!-- Priority & Status -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label for="priority" class="block text-xs font-bold uppercase tracking-wider text-[#536581] mb-2">
                        Priority
                    </label>
                    <select 
                        id="priority" 
                        name="priority" 
                        class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50/50 text-sm text-[#253858] focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#315fe8] focus:border-transparent transition"
                    >
                        <option value="Low" {{ old('priority', $task->priority) === 'Low' ? 'selected' : '' }}>Low</option>
                        <option value="Medium" {{ old('priority', $task->priority) === 'Medium' ? 'selected' : '' }}>Medium</option>
                        <option value="High" {{ old('priority', $task->priority) === 'High' ? 'selected' : '' }}>High</option>
                    </select>
                </div>

                <div>
                    <label for="status" class="block text-xs font-bold uppercase tracking-wider text-[#536581] mb-2">
                        Status
                    </label>
                    <select 
                        id="status" 
                        name="status" 
                        class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50/50 text-sm text-[#253858] focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#315fe8] focus:border-transparent transition"
                    >
                        <option value="Pending" {{ old('status', $task->status) === 'Pending' ? 'selected' : '' }}>Pending</option>
                        <option value="In progress" {{ old('status', $task->status) === 'In progress' ? 'selected' : '' }}>In progress</option>
                        <option value="Completed" {{ old('status', $task->status) === 'Completed' ? 'selected' : '' }}>Completed</option>
                    </select>
                </div>
            </div>

            <!-- Description -->
            <div>
                <label for="description" class="block text-xs font-bold uppercase tracking-wider text-[#536581] mb-2">
                    Description
                </label>
                <textarea 
                    id="description" 
                    name="description" 
                    rows="4" 
                    class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50/50 text-sm text-[#253858] focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#315fe8] focus:border-transparent transition"
                >{{ old('description', $task->description) }}</textarea>
            </div>

            <!-- Buttons -->
            <div class="pt-4 flex items-center justify-between border-t border-slate-100">
                <a 
                    href="{{ route('tasks.index') }}" 
                    class="px-6 py-3 rounded-xl border border-slate-200 text-[#315fe8] font-bold text-sm hover:bg-slate-50 transition"
                >
                    Cancel
                </a>
                <button 
                    type="submit" 
                    class="px-7 py-3 rounded-xl bg-[#315fe8] hover:bg-[#254ec9] active:bg-[#1f40aa] text-white font-bold text-sm shadow-md shadow-blue-500/20 transition"
                >
                    Update Task
                </button>
            </div>
        </form>

    </div>
</div>
@endsection

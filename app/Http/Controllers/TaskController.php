<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of tasks (Figma 3_My Tasks 1)
     */
    public function index(Request $request)
    {
        $query = Task::query();

        // Search query
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('course', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        // Status filter tab
        $filter = $request->input('filter', 'all');
        if ($filter === 'pending') {
            $query->where('status', 'Pending');
        } elseif ($filter === 'in_progress') {
            $query->where('status', 'In progress');
        } elseif ($filter === 'completed') {
            $query->where('status', 'Completed');
        }

        // Counts for tabs
        $totalCount = Task::count();
        $pendingCount = Task::where('status', 'Pending')->count();
        $inProgressCount = Task::where('status', 'In progress')->count();
        $completedCount = Task::where('status', 'Completed')->count();

        $tasks = $query->orderBy('due_date', 'asc')->get();

        return view('tasks.index', compact(
            'tasks',
            'filter',
            'totalCount',
            'pendingCount',
            'inProgressCount',
            'completedCount'
        ));
    }

    /**
     * Show form to create a new task (Figma 7_Add Task 1)
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created task
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'course' => ['nullable', 'string', 'max:255'],
            'due_date' => ['nullable', 'date'],
            'due_time' => ['nullable', 'string', 'max:50'],
            'status' => ['required', 'in:Pending,In progress,Completed'],
            'priority' => ['required', 'in:Low,Medium,High'],
            'description' => ['nullable', 'string'],
        ]);

        $validated['user_id'] = Auth::id() ?? 1;

        $task = Task::create($validated);

        if ($request->wantsJson()) {
            return response()->json(['success' => true, 'task' => $task]);
        }

        return redirect()->route('tasks.index')->with('success', 'Task "' . $task->title . '" added successfully!');
    }

    /**
     * Display the specified task details (Figma 6_Task Details 1)
     */
    public function show(Task $task, Request $request)
    {
        if ($request->wantsJson()) {
            return response()->json($task);
        }
        return view('tasks.show', compact('task'));
    }

    /**
     * Show form for editing task (Figma 8_Edit Task 1)
     */
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified task
     */
    public function update(Request $request, Task $task)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'course' => ['nullable', 'string', 'max:255'],
            'due_date' => ['nullable', 'date'],
            'due_time' => ['nullable', 'string', 'max:50'],
            'status' => ['required', 'in:Pending,In progress,Completed'],
            'priority' => ['required', 'in:Low,Medium,High'],
            'description' => ['nullable', 'string'],
        ]);

        $task->update($validated);

        if ($request->wantsJson()) {
            return response()->json(['success' => true, 'task' => $task]);
        }

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully!');
    }

    /**
     * Quick status toggle (Checkbox click in task list)
     */
    public function toggle(Task $task, Request $request)
    {
        $newStatus = $task->status === 'Completed' ? 'Pending' : 'Completed';
        $task->update(['status' => $newStatus]);

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'status' => $task->status,
                'is_completed' => $task->status === 'Completed',
            ]);
        }

        return back()->with('success', 'Task status updated to ' . $newStatus);
    }

    /**
     * Remove the specified task
     */
    public function destroy(Task $task, Request $request)
    {
        $title = $task->title;
        $task->delete();

        if ($request->wantsJson()) {
            return response()->json(['success' => true]);
        }

        return redirect()->route('tasks.index')->with('success', 'Task "' . $title . '" deleted.');
    }
}

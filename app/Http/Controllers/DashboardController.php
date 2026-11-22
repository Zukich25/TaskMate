<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    // Main dashboard view showing task statistics and upcoming deadlines
    public function index()
    {
        $totalTasks = Task::count();
        $inProgressCount = Task::where('status', 'In progress')->count();
        $completedCount = Task::where('status', 'Completed')->count();
        $pendingCount = Task::where('status', 'Pending')->count();

        // Tasks due today that are not completed
        $todayTasksCount = Task::whereDate('due_date', Carbon::today())
            ->where('status', '!=', 'Completed')
            ->count();

        // Nearest upcoming tasks for quick preview
        $upcomingTasks = Task::where('status', '!=', 'Completed')
            ->orderBy('due_date', 'asc')
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'totalTasks',
            'inProgressCount',
            'completedCount',
            'pendingCount',
            'todayTasksCount',
            'upcomingTasks'
        ));
    }
}

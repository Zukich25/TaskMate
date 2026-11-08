<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    /**
     * Show the Home / Dashboard screen (Figma 2_Dashboard 1)
     */
    public function index()
    {
        $totalTasks = Task::count();
        $inProgressCount = Task::where('status', 'In progress')->count();
        $completedCount = Task::where('status', 'Completed')->count();
        $pendingCount = Task::where('status', 'Pending')->count();

        // Tasks due today or upcoming
        $todayTasksCount = Task::whereDate('due_date', Carbon::today())
            ->where('status', '!=', 'Completed')
            ->count();

        // Recent upcoming tasks list
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

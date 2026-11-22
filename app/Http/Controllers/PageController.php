<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    // Notifications view
    public function notifications()
    {
        $upcomingTasks = Task::where('status', '!=', 'Completed')
            ->orderBy('due_date', 'asc')
            ->get();

        return view('pages.notifications', compact('upcomingTasks'));
    }

    // Student profile & settings view
    public function profile()
    {
        $user = Auth::user() ?? (object)[
            'name' => 'Cabansay John Kenny C.',
            'email' => 'Cabansay@gmail.com',
        ];

        return view('pages.profile', compact('user'));
    }

    // Update profile information
    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        if (Auth::check()) {
            Auth::user()->update(['name' => $request->name]);
        }

        return back()->with('success', 'Profile updated successfully!');
    }

    // Help & tips view
    public function help()
    {
        return view('pages.help');
    }
}

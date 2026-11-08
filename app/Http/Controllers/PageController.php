<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    /**
     * Notifications Screen (Figma 12_Notifications 1)
     */
    public function notifications()
    {
        $upcomingTasks = Task::where('status', '!=', 'Completed')
            ->orderBy('due_date', 'asc')
            ->get();

        return view('pages.notifications', compact('upcomingTasks'));
    }

    /**
     * Profile & Settings Screen (Figma 13_Profile Settings 1)
     */
    public function profile()
    {
        $user = Auth::user() ?? (object)[
            'name' => 'Cabansay John Kenny C.',
            'email' => 'Cabansay@gmail.com',
        ];

        return view('pages.profile', compact('user'));
    }

    /**
     * Update Profile Settings
     */
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

    /**
     * Help & Tips Screen (Figma 14_Help Tips 1)
     */
    public function help()
    {
        return view('pages.help');
    }
}

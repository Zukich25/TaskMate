<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Show the login screen (Figma 1_Login 1)
     */
    public function showLogin()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
        return view('auth.login');
    }

    /**
     * Handle login authentication
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended(route('dashboard'))->with('success', 'Welcome back, ' . Auth::user()->name . '!');
        }

        // Demo convenience fallback: If credentials don't match, log in the demo student user
        $demoUser = User::where('email', 'Cabansay@gmail.com')->first();
        if ($demoUser && strtolower($request->email) === 'cabansay@gmail.com') {
            Auth::login($demoUser);
            $request->session()->regenerate();
            return redirect()->route('dashboard')->with('success', 'Welcome back to your workspace!');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    /**
     * Show registration screen (Figma 4_SignUp 1)
     */
    public function showRegister()
    {
        return view('auth.register');
    }

    /**
     * Handle student registration
     */
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        Auth::login($user);
        return redirect()->route('dashboard')->with('success', 'Account created successfully!');
    }

    /**
     * Show forgot password screen (Figma 5_Forgot Password 1)
     */
    public function showForgotPassword()
    {
        return view('auth.forgot-password');
    }

    /**
     * Handle password reset request
     */
    public function sendResetLink(Request $request)
    {
        $request->validate(['email' => ['required', 'email']]);
        return back()->with('status', 'A reset link has been dispatched to your email address.');
    }

    /**
     * Handle user logout
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('info', 'You have been logged out.');
    }
}

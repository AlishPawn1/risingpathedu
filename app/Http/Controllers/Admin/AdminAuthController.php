<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
    public function showLogin()
    {
        if (session('admin_logged_in')) {
            return redirect()->route('admin.dashboard');
        }

        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        $email = $request->input('email');
        $password = $request->input('password');

        $adminEmail = env('ADMIN_EMAIL');
        $adminPassword = env('ADMIN_PASSWORD');

        if ($email === $adminEmail && $password === $adminPassword) {
            session(['admin_logged_in' => true, 'admin_email' => $email]);
            return redirect()->route('admin.dashboard')->with('success', 'Welcome to Admin Dashboard!');
        }

        return back()->with('error', 'Invalid email or password.');
    }

    public function logout()
    {
        session()->forget(['admin_logged_in', 'admin_email']);
        session()->flush();
        return redirect()->route('admin.login')->with('success', 'Logged out successfully!');
    }
}

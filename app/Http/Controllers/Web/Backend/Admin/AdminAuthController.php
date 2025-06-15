<?php

namespace App\Http\Controllers\Web\Backend\Admin;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use App\Http\Requests\Auth\LoginRequest;

class AdminAuthController extends Controller
{
    public function login()
    {
        return Inertia::render('admin/auth/AdminLogin');
    }
    
    public function adminLogin(LoginRequest $request)
    {
        $email = $request->email;
        $user = User::where('email', $email)->where('role', 1)->first();

        if ($user) {
            $request->authenticate();
            $request->session()->regenerate();
            return redirect()->intended(route('admin.dashboard', absolute: false))->with('message', 'Admin Login successful');
        }

        return redirect()->back();
    }
}

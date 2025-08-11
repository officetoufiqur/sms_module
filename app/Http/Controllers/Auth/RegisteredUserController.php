<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Inertia\Inertia;
use App\Mail\OtpMail;
use Inertia\Response;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;

class RegisteredUserController extends Controller
{
    /**
     * Show the registration page.
     */
    public function create(): Response
    {
        return Inertia::render('auth/Register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|lowercase|email|max:255|unique:' . User::class,
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $otp = random_int(100000, 999999);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 0,
            'otp' => $otp,
            'is_verified' => false,
        ]);

        event(new Registered($user));

        session(['email' => $user->email]);

        // Auth::login($user);
        Mail::to($user->email)->send(new OtpMail($otp, $user));

        return to_route('otp');
    }

    public function otpCreate(): Response
    {
        $email = session('email');
        return Inertia::render('auth/Otp', compact('email'));
    }

    public function otpStore(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'otp' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return to_route('login')->withErrors(['email' => 'User not found.']);
        }

        if ($user->otp === $request->otp) {
            $user->is_verified = true;
            $user->otp = null;  
            $user->save();

            Auth::login($user);

            return to_route('kyc')->with('message', 'OTP verified successfully.');
        }

        return redirect()->back()->withErrors(['otp' => 'Invalid OTP or Email does not match.']);
    }

}

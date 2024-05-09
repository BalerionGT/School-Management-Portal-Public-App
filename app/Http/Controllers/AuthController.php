<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
    public function authenticate(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    $user = User::where('email', '=', $request->email)->first();
    if ($user && Hash::check($request->password, $user->password)) {
        Auth::login($user);
        if (Auth::check()) {
            if ($user->admin == 0) {
                if ($user->hasRole('chef')) {
                    return redirect()->route('dashboard.chef');
                } elseif ($user->hasRole('prof')) {
                    return redirect()->route('dashboard.prof');
                } else {
                    return redirect()->route('dashboard.student');
                }
            } else {
                return redirect()->route('dashboard.admin');
            }
        } else {
            return redirect()->route('login')->withErrors('Les identifiants ne correspondent pas.');
        }
    } else {
        return redirect()->route('login')->withErrors('Les identifiants ne correspondent pas.');
    }
}

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }
}

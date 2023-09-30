<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() {
        return view('auth.login');
    }

    public function authenticate() {
        $credentials = request(['email', 'password']);
        if (auth()->attempt($credentials)) {
            request()->session()->regenerate();
            return redirect()->intended('/');
        }
        return back()->with(['login_error' => 'Email or password is incorrect.']);
    }

    public function logout() {
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('auth.login');
    }
}

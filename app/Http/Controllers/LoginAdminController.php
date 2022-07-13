<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginAdminController extends Controller
{
    public function index() {
        return view('admin.login');
    }

    public function authenticate() {
        $credentials = request(['email', 'password']);
        if (auth()->guard('admin')->attempt($credentials)) {
            request()->session()->regenerate();
            return redirect()->intended('/');
        }
        return back()->with(['login_error' => 'Email or password is incorrect.']);
    }

    public function logout() {
        auth()->guard('admin')->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}
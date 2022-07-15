<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Grafic;

class LoginController extends Controller
{
    public function index() {
        return view('auth.login');
    }

    public function authenticate() {
        $credentials = request(['email', 'password']);
        $grafic = new Grafic;
        date_default_timezone_set('Asia/Jakarta');

        if (auth()->attempt($credentials)) {
            request()->session()->regenerate();

            $grafic->user_id = Auth::user()->id;
            $grafic->tanggal_login = date('Y-m-d');
            $grafic->bulan_login = date('m');
            $grafic->save();

            return redirect()->intended('/buku');
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class RegisterAdminController extends Controller
{
    public function index()
    {
        return view('admin.register');
    }

    public function register(Request $request)
    {
        $credentials = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email:dns|max:255',
            'password' => 'required|string|min:6',
        ]);

        $credentials['password'] = Hash::make($credentials['password']);
        Admin::create($credentials);
        return redirect()->route('admin.login')->with('success', 'Berhasil mendaftar!');
    }
}

<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class ListAnggotaController extends Controller
{
    public function index()
    {
        $anggota = User::all();
        $unverified = User::where('is_verified', 0)->get();
        
        if (request()->has('search')) {
            $anggota = User::where('name', 'LIKE', '%' . request('search') . '%')->get();
        }
        
        return view('admin.list-anggota.index', compact('anggota', 'unverified'));
    }

    public function verify()
    {
        $anggota = User::find(request()->id);
        $anggota->is_verified = 1;
        $anggota->save();
        return back()->with('success', 'Berhasil mengkonfirmasi data!');
    }
}

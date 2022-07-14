<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengembalian;

class PengembalianController extends Controller
{
    public function index()
    {
        $data = Pengembalian::all();
        $verif_status = Pengembalian::where('status', '=', 'denda')->get();

        if (auth()->user()->is_verified == 1) {
            $data = Pengembalian::where('user_id', '=', auth()->user()->id)->get();
            return view('user.denda.index', compact('data', 'verif_status'));
        }
        return view('admin.pengembalian.index', compact('data', 'verif_status'));
    }

    public function verify()
    {
        $dt = Pengembalian::find(request()->id);

        $dt->status = request()->status;
        $dt->jumlah_hari = 0;
        $dt->total_denda = 0;
        
        $dt->save();

        return back()->with('success', 'Denda terbayar');
    }
}

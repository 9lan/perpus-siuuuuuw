<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\User;
use App\Models\Admin;
use App\Models\Peminjaman;
use App\Models\Pengembalian;

class PeminjamanController extends Controller
{
    public function index()
    {
        $buku = Buku::all();
        $anggota = User::all();
        $petugas = Admin::all();
        $peminjaman = Peminjaman::where('status', '!=', 'tersedia')->get();
        $booking = Peminjaman::where('status', 'booking')->get();

        if (auth()->user()->is_verified == 1) {
            $peminjaman = Peminjaman::where('user_id', '=', auth()->user()->id)->get();
            return view('user.peminjaman.index', compact('buku', 'anggota', 'petugas', 'peminjaman', 'booking'));
        }

        return view('admin.peminjaman.index', compact('buku', 'anggota', 'petugas', 'peminjaman', 'booking'));
    }

    public function verify()
    {
        date_default_timezone_set('Asia/Jakarta');
        $dt = Peminjaman::find(request()->id);
        $buku = Buku::findOrFail($dt->buku_id);

        $buku->status = 'dipinjam';
        $dt->admin_id = auth()->user()->id;
        $dt->status = request()->status;
        $dt->tanggal_kembali = date_format(date_create(request()->tanggal_kembali), 'Y-m-d');
        
        $buku->save();
        $dt->save();

        return back()->with('success', 'Buku dipinjamkan');
    }

    public function findById(Request $request, $id)
    {
        $dt = Peminjaman::findOrFail($id);

        return view('admin.peminjaman.view', compact('dt'));
    }

    public function update(Request $request, $id)
    {
        date_default_timezone_set('Asia/Jakarta');
        $peminjaman = Peminjaman::findOrFail($id);
        $buku = Buku::findOrFail($peminjaman->buku_id);
        
        $pengembalian = new Pengembalian();
        
        $buku->status = 'tersedia';
        
        $pengembalian->tanggal_kembali = date_format(date_create(request()->tanggal_kembali), 'Y-m-d');
        $pengembalian->jatuh_tempo = $peminjaman->tanggal_kembali;
        
        $jumlah_hari = date_diff(date_create($peminjaman->tanggal_kembali), date_create(request()->tanggal_kembali))->days;

        if ($jumlah_hari > 0) {
            $pengembalian->jumlah_hari = $jumlah_hari;
            $pengembalian->total_denda = $jumlah_hari * $peminjaman->buku->denda;
            $pengembalian->status = 'Denda';
        } else {
            $pengembalian->jumlah_hari = 0;
            $pengembalian->total_denda = 0;
            $pengembalian->status = 'Tepat Waktu';
        }

        $pengembalian->buku_id = $peminjaman->buku->id;
        $pengembalian->admin_id = auth()->user()->id;
        $pengembalian->user_id = $peminjaman->user->id;
        
        $pengembalian->save();
        $buku->save();
        $peminjaman->delete();

        return redirect()->route('admin.peminjaman')->with('success', 'Buku dipinjamkan');
    }
}

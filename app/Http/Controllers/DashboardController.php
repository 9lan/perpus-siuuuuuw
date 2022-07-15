<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grafic;
use App\Models\Buku;
use App\Models\User;
use App\Models\Pengembalian;

class DashboardController extends Controller
{
    public function index()
    {
        $grafik = Grafic::all();
        $buku = Buku::all()->sortByDesc('total_terpinjam');
        $anggota = User::all();

        $pengunjung_hari_ini = Grafic::where('tanggal_login', date('Y-m-d'))->count();
        $pengunjung_bulan_ini = Grafic::where('bulan_login', date('m'))->count();
        $total_buku = Buku::count();
        $total_anggota = User::count();

        return view('dashboard', compact('pengunjung_hari_ini', 'pengunjung_bulan_ini', 'total_buku', 'total_anggota', 'grafik', 'buku'));
    }
}

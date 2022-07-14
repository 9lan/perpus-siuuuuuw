<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\RakBuku;
use App\Models\Peminjaman;
use Illuminate\Support\Facades\Storage;

class BukuController extends Controller
{
    public function index() 
    {
        $buku = Buku::all();
        $rak_buku = RakBuku::all();

        if (request()->has('search')) {
            $buku = Buku::where('judul', 'LIKE', '%' . request('search') . '%')->get();
        }

        if (auth()->user()->is_verified == 1) {
            return view('user.buku.index', compact('buku', 'rak_buku'));
        }

        return view('admin.list-buku', compact('buku', 'rak_buku'));
    }

    public function create(Request $request)
    {
        $data = new Buku();

        if ($request->hasFile('foto')) {
            $data->foto = $request->file('foto')->store('images');
        }

        $data->judul = $request->judul;
        $data->sinopsis = $request->sinopsis;
        $data->penulis = $request->penulis;
        $data->denda = $request->denda;
        $data->kode_buku = $request->kode_buku;
        $data->rak_buku_id = $request->kode_rak;
        $data->status = $request->status;
        
        $data->save();

        return back()->with('success', 'Berhasil menambahkan data!');
    }

    public function findById(Request $request, $id)
    {
        $data = Buku::find($id);
        $rak_buku = RakBuku::all();

        if (auth()->user()->is_verified == 1) {
            return view('user.buku.lihat', compact('data', 'rak_buku'));
        }

        return view('admin.edit-buku', ['data' => $data, 'rak_buku' => $rak_buku]);
    }

    public function update(Request $request, $id)
    {
        $data = Buku::findOrFail($id);
        $photo_path = public_path('images/' . $data->foto);

        if ($request->hasFile('foto-baru')) {
            Storage::delete($data->foto);
            $data->foto = $request->file('foto-baru')->store('images');
        } else {
            $data->foto = $data->foto;
        }

        $data->judul = $request->judul;
        $data->sinopsis = $request->sinopsis;
        $data->penulis = $request->penulis;
        $data->denda = $request->denda;
        $data->rak_buku_id = $request->kode_rak;
        $data->kode_buku = $request->kode_buku;
        $data->status = $request->status;
        
        $data->save();

        return redirect()->route('admin.list-buku')->with('success', 'Berhasil mengubah data!');
    }

    public function delete(Request $request, $id)
    {
        $data = Buku::findOrFail($id);

        if ($data->foto) {
            unlink(public_path('images').$data->foto);
        }

        $data->delete();

        return redirect()->route('admin.list-buku')->with('success', 'Berhasil menghapus data!');
    }

    public function pinjam(Request $request, $id)
    {
        date_default_timezone_set('Asia/Jakarta');
        $data = Buku::findOrFail($id);
        $pinjam = new Peminjaman;
        
        $pinjam->user_id = auth()->user()->id;
        $pinjam->buku_id = $data->id;
        $pinjam->tanggal_pinjam = date('Y-m-d');
        $pinjam->status = $request->status;
        
        $data->status = $request->status;

        $pinjam->save();
        $data->save();

        return redirect()->route('user.buku.index')->with('success', 'Berhasil meminjam buku!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\RakBuku;

class RakBukuController extends Controller
{
    public function index()
    {
        $rak_buku = RakBuku::all();
        return view('admin.rak-buku', ['rak_buku' => $rak_buku]);
    }

    public function create()
    {
        $data = request()->validate([
            'nama_rak' => 'required|min:3',
            'kode_rak' => 'required|min:1',
        ]);

        RakBuku::create($data);
        return back()->with('success', 'Berhasil menambahkan data!');
    }

    public function findById($id)
    {
        $rak_buku = RakBuku::find($id);
        return view('admin.edit-rak-buku', ['rak_buku' => $rak_buku]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_rak' => 'required|min:3',
            'kode_rak' => 'required|min:1',
        ]);

        $data = RakBuku::findOrFail($id);

        $data->update([
            'nama_rak' => $request->nama_rak,
            'kode_rak' => $request->kode_rak,
        ]);

        if ($data) {
            return redirect()->route('admin.rak-buku')->with('success', 'Berhasil mengubah data!');
        } else {
            return back()->with('error', 'Gagal mengubah data!');
        }
    }
}

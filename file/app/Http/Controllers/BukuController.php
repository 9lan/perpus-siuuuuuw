<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\RakBuku;

class BukuController extends Controller
{
    public function index() 
    {
        $buku = Buku::all();
        $rak_buku = RakBuku::all();
        return view('admin.list-buku', ['buku' => $buku, 'rak_buku' => $rak_buku]);
    }

    public function create(Request $request)
    {
        $data = new Buku();

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $fileName = $file->getClientOriginalName();
            $request->file('foto')->move(public_path('images'), $fileName);
            $data->foto = $fileName;
        }

        $data->judul = $request->judul;
        $data->sinopsis = $request->sinopsis;
        $data->penulis = $request->penulis;
        $data->denda = $request->denda;
        $data->kode_rak = $request->kode_rak;
        $data->kode_buku = $request->kode_buku;
        $data->status = $request->status;
        
        $data->save();

        return back()->with('success', 'Berhasil menambahkan data!');
    }

    public function findById(Request $request, $id)
    {
        $data = Buku::find($id);
        $rak_buku = RakBuku::all();

        return view('admin.edit-buku', ['data' => $data, 'rak_buku' => $rak_buku]);
    }

    public function update(Request $request, $id)
    {
        $data = Buku::findOrFail($id);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $fileName = $file->getClientOriginalName();
            $request->file('foto')->move(public_path('images'), $fileName);
            $data->foto = $fileName;
        } else {
            $data->foto = $data->foto;
        }

        $data->judul = $request->judul;
        $data->sinopsis = $request->sinopsis;
        $data->penulis = $request->penulis;
        $data->denda = $request->denda;
        $data->kode_rak = $request->kode_rak;
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
}

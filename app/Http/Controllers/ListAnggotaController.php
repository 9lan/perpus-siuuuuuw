<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

    public function findById(Request $request, $id)
    {
        $anggota = User::find($id);
        return view('admin.list-anggota.view', compact('anggota'));
    }

    public function update(Request $request, $id)
    {
        date_default_timezone_set('Asia/Jakarta');

        $anggota = User::find($id);
       
        if ($request->hasFile('foto-baru')) {
            Storage::delete($anggota->foto);
            $anggota->foto = $request->file('foto-baru')->store('images');
        } else {
            $data->foto = $data->foto;
        }

        $anggota->name = $request->name;
        $anggota->telp = $request->telp;
        $anggota->alamat = $request->alamat;
        $anggota->tanggal_lahir =  date_format(date_create($request->tanggal_lahir), 'Y-m-d');

        $anggota->save();
        return back()->with('success', 'Berhasil mengubah data!');
    }

    public function delete(Request $request, $id)
    {
        $anggota = User::findOrFail($id);

        if ($anggota->foto) {
            Storage::delete($anggota->foto);
        }

        $anggota->delete();

        return redirect()->route('admin.anggota')->with('success', 'Berhasil menghapus data!');
    }

}

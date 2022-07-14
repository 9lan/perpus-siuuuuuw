<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Admin;
use App\Models\Buku;

class Pengembalian extends Model
{
    use HasFactory;

    protected $table = 'pengembalians';
    protected $fillable = ['tanggal_kembali', 'id_petugas', 'id_anggota', 'kode_buku', 'status'];

    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function buku()
    {
        return $this->belongsTo(Buku::class);
    }
}

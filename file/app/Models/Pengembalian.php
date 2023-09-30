<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    use HasFactory;

    protected $table = 'pengembalian';
    protected $fillable = ['tanggal_kembali', 'id_petugas', 'id_anggota', 'kode_buku', 'status'];

    

}

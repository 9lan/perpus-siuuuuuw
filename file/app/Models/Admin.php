<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Admin extends Authenticatable
{
    use HasFactory;

    protected $table = 'admins';
    protected $guarded = ['id'];

    public function buku()
    {
        return $this->hasMany(Buku::class);
    }

    public function rak_buku()
    {
        return $this->hasMany(RakBuku::class);
    }

    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class);
    }

    public function pengembalian()
    {
        return $this->hasMany(Pengembalian::class);
    }

}

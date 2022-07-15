<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grafic extends Model
{
    use HasFactory;

    protected $table = 'grafics';
    protected $guarded = ['id'];

}

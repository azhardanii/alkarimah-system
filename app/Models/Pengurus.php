<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengurus extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_pengurus',
        'jabatan',
        'no_hp_pengurus',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $primaryKey = 'id_pembayaran';

    use HasFactory;

    protected $fillable = [
        'santri_nis', 'jenis_pembayaran', 'id_pembayaran', 'metode_pembayaran', 'tagihan', 'jumlah', 'status_pembayaran', 'jadwal_tagihan', 'nama_pembayaran'
    ];

    public function santri()
    {
        return $this->belongsTo(Santri::class, 'santri_nis', 'nis');
    }

    public function getIdPembayaranAttribute($value)
    {
        return $value;
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Santri extends Model
{
    use HasFactory;

    protected $primaryKey = 'nis';

    protected $fillable = [
        'nama_santri', 'nis', 'nisn', 'tempat_lahir', 'tanggal_lahir', 'alamat_santri', 'no_hp_santri', 'gender', 'tanggal_masuk', 'tanggal_keluar', 'status_pondok', 'status_keluarga', 'foto_santri', 'agama', 'anak_ke','status_pendaftaran','jenjang_diniyah','jenjang_formal','nama_bapak','nama_ibu','pekerjaan_bapak','pekerjaan_ibu', 'alamat_ortu', 'no_hp_ortu','jadwal_makan','sekolah_santri','nama_wali', 'no_hp_wali', 'alamat_wali'
    ];

    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class, 'santri_nis', 'nis');
    }
}

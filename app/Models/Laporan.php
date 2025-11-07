<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;
     protected $table = 'laporan';

    protected $fillable = [
        'user_id',
        'nama_barang',
        'deskripsi',
        'nomor_telepon',
        'lokasi',
        'tanggal',
        'foto',
        'jenis_laporan',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

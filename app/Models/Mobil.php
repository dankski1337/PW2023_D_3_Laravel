<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    use HasFactory;

    protected $table = 'mobils';
    protected $primaryKey = 'id_mobil';
    protected $fillable = [
        'gambar',
        'model',
        'bahan_bakar',
        'transmisi',
        'jumlah_kursi',
        'tahun_produksi',
        'warna',
        'tarif',
        'status',
    ];
}

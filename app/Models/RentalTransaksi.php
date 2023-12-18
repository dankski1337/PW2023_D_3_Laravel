<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RentalTransaksi extends Model
{
    use HasFactory;

    protected $table = 'rental_transaksis';
    protected $primaryKey = 'id_rental_transaksi';
    protected $fillable = [
        'id_mobil',
        'id_user',
        'lokasi_pengambilan',
        'tanggal_pengambilan',
        'jam_pengambilan',
        'tanggal_pengembalian',
        'jam_pengembalian',
        'status',
        'denda',
        'total_harga',
        'deadline_pembayaran',
    ];

    public function mobil()
    {
        return $this->belongsTo(Mobil::class, 'id_mobil', 'id_mobil');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }
}

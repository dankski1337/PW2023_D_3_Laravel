<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mobil;
use App\Models\RentalTransaksi;
use App\Models\User;

class MasterTransaksiController extends Controller
{
    public function indexTransaksi()
    {
        $data_transaksi = RentalTransaksi::with('mobil', 'user')->latest()->paginate(10);
        return view('Admin.dataTransaksi.data-transaksi', compact('data_transaksi'));
    }

    public function cariTransaksi(Request $request)
    {
        $cari = $request->cari;
        if ($cari == null) {
            return redirect()->route('data-transaksi');
        }
        $data_transaksi = RentalTransaksi::where('id_rental_transaksi', 'like', "%$cari%")
            ->orWhereHas('mobil', function ($query) use ($cari) {
                $query->where('model', 'LIKE', "%$cari%");
            })
            ->orWhereHas('user', function ($query) use ($cari) {
                $query->where('nama', 'LIKE', "%$cari%");
            })
            ->orWhere('lokasi_pengambilan', 'like', "%$cari%")
            ->orWhere('tanggal_pengambilan', 'like', "%$cari%")
            ->orWhere('jam_pengambilan', 'like', "%$cari%")
            ->orWhere('tanggal_pengembalian', 'like', "%$cari%")
            ->orWhere('jam_pengembalian', 'like', "%$cari%")
            ->orWhere('denda', 'like', "%$cari%")
            ->orWhere('total_harga', 'like', "%$cari%")
            ->orWhere('status', 'like', "%$cari%")
            ->orWhere('deadline_pembayaran', 'like', "%$cari%")
            ->paginate(10);
        return view('Admin.dataTransaksi.data-transaksi', compact('data_transaksi'));
    }
}

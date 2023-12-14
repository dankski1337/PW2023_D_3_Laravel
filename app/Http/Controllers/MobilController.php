<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mobil;

class MobilController extends Controller
{
    public function indexMobil()
    {
        $mobil = Mobil::latest()->paginate(6);
        return view('User.mobil.list-mobil', compact('mobil'));
    }

    public function cariMobil(Request $request)
    {
        $cari = $request->cari;
        if($cari == null){
            return redirect()->route('list-mobil');
        }
        $mobil = Mobil::where('model', 'like', "%$cari%")
            ->orWhere('bahan_bakar', 'like', "%$cari%")
            ->orWhere('transmisi', 'like', "%$cari%")
            ->orWhere('jumlah_kursi', 'like', "%$cari%")
            ->orWhere('tahun_produksi', 'like', "%$cari%")
            ->orWhere('warna', 'like', "%$cari%")
            ->orWhere('tarif', 'like', "%$cari%")
            ->paginate(6);
        return view('User.mobil.list-mobil', compact('mobil'));
    }
}

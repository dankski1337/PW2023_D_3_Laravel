<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mobil;

class MasterMobilController extends Controller
{
    public function indexMobil()
    {
        $data_mobil = Mobil::latest()->paginate(10);
        return view('Admin.dataMobil.data-mobil', compact('data_mobil'));
    }

    public function cariMobil(Request $request){
        $cari = $request->cari;
        if ($cari == null) {
            return redirect()->route('data-mobil');
        }
        $data_mobil = Mobil::where('model', 'like', "%$cari%")
            ->orWhere('bahan_bakar', 'like', "%$cari%")
            ->orWhere('transmisi', 'like', "%$cari%")
            ->orWhere('jumlah_kursi', 'like', "%$cari%")
            ->orWhere('tahun_produksi', 'like', "%$cari%")
            ->orWhere('warna', 'like', "%$cari%")
            ->orWhere('tarif', 'like', "%$cari%")
            ->paginate(10);
        return view('Admin.dataMobil.data-mobil', compact('data_mobil'));
    }
}

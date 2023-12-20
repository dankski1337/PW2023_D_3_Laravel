<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mobil;
use Illuminate\Support\Facades\Storage;

class MasterMobilController extends Controller
{
    public function indexMobil()
    {
        $data_mobil = Mobil::paginate(10);
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

    public function tambahMobil(){
        return view('Admin.dataMobil.input-mobil');
    }

    public function actionTambahMobil(Request $request){
        $validate = $request->validate([
            'model' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'bahan_bakar' => 'required',
            'transmisi' => 'required',
            'jumlah_kursi' => 'required',
            'tahun_produksi' => 'required',
            'warna' => 'required',
            'tarif' => 'required',
        ]);

        $uploadeFolder = 'mobil';
        $gambar = $request->file('gambar');
        $gambar_path = $gambar->store($uploadeFolder, 'public');
        $uploadGambarResponse = basename($gambar_path);

        Mobil::create([
            'model' => $request->model,
            'gambar' => $uploadGambarResponse,
            'bahan_bakar' => $request->bahan_bakar,
            'transmisi' => $request->transmisi,
            'jumlah_kursi' => $request->jumlah_kursi,
            'tahun_produksi' => $request->tahun_produksi,
            'warna' => $request->warna,
            'tarif' => $request->tarif,
            'status' => 'Tersedia',
        ]);

        return redirect()->route('data-mobil')->with('success', 'Data Mobil Berhasil Ditambahkan');
    }

    public function editMobil($id_mobil){
        $mobil = Mobil::find($id_mobil);
        return view('Admin.dataMobil.edit-mobil', compact('mobil'));
    }

    public function actionEditMobil(Request $request, $id){
        $mobil = Mobil::find($id);
        if(!$mobil){
            return redirect()->route('data-mobil')->with('error', 'Data Mobil Tidak Ditemukan');
        }

        $validate = $request->validate([
            'model' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg|max:2048',
            'bahan_bakar' => 'required',
            'transmisi' => 'required',
            'jumlah_kursi' => 'required',
            'tahun_produksi' => 'required',
            'warna' => 'required',
            'tarif' => 'required',
        ]);
        
        if($request->file('gambar') != null){
            $uploadeFolder = 'mobil';
            $gambar = $request->file('gambar');
            $gambar_path = $gambar->store($uploadeFolder, 'public');
            $uploadGambarResponse = basename($gambar_path);
            $validate['gambar'] = $uploadGambarResponse;
            //delete old gambar
            Storage::delete('/public/'.$uploadeFolder.'/'.$mobil->gambar);
        }

        $mobil->update($validate);

        return redirect()->route('data-mobil')->with('success', 'Data Mobil Berhasil Diubah');
    }

    public function actionEditStatusMobil(Request $request){
        $mobil = Mobil::find($request->id_mobil);
        if(!$mobil){
            return redirect()->route('data-mobil')->with('error', 'Data Mobil Tidak Ditemukan');
        }

        if($mobil->status == 'Tersedia'){
            $mobil->update([
                'status' => 'Tidak Tersedia',
            ]);
        }else{
            $mobil->update([
                'status' => 'Tersedia',
            ]);
        }

        return redirect()->route('data-mobil')->with('success', 'Status Mobil Berhasil Diubah');
    }

    public function deleteMobil(Request $request){
        $mobil = Mobil::find($request->id_mobil);
        if(!$mobil){
            return redirect()->route('data-mobil')->with('error', 'Data Mobil Tidak Ditemukan');
        }
        $uploadeFolder = 'mobil';
        Storage::delete('/public/'.$uploadeFolder.'/'.$mobil->gambar);
        $mobil->delete();

        return redirect()->route('data-mobil')->with('success', 'Data Mobil Berhasil Dihapus');
    }
}

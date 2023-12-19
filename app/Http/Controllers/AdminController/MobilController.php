<?php

namespace App\Http\Controllers\AdminController;

use Illuminate\Http\Request;
use App\Models\Mobil;
use Illuminate\Validation\ValidationException;

class MobilController extends AdminController{
    public function indexMobil(){
        $mobil = Mobil::latest()->paginate(6);
        return view('User.mobil.list-mobil', compact('mobil'));
    }

    /**
     * create
     * 
     * @return void
     */
    public function createMobil(){
        return view('Admin.dataMobil.input-mobil');
    }

    /**
     * store
     * 
     * @param Request $request
     * @return void
     */
    public function storeMobil(Request $request){
        $this->validate($request, [
            'gambar' => 'nullable',
            'model' => 'required',
            'bahan_bakar' => 'required',
            'transmisi' => 'required',
            'jumlah_kursi' => 'required',
            'tahun_produksi' => 'required',
            'warna' => 'required',
            'tarif' => 'required',
        ]);

        Mobil::create([
            'gambar' => $request->gambar,
            'model' => $request->model,
            'bahan_bakar' => $request->bahan_bakar,
            'transmisi' => $request->transmisi,
            'jumlah_kursi' => $request->jumlah_kursi,
            'tahun_produksi' => $request->tahun_produksi,
            'warna' => $request->warna,
            'tarif' => $request->tarif
        ]);

        try{
            return redirect()->route('mobil.index');
        }catch(Exception $e){
            return redirect()->route('mobil.index');
        }
    }

    /**
     * edit
     * 
     * @param int $id
     * @return void
     */
    public function editMobil($id){
        $mobil = Mobil::find($id);
        return view('Admin.dataMobil.edit-mobil');
    }

    /**
     * delete
     * 
     * @param int $id
     * @return void
     */
    public function destroyMobil($id){
        $mobil = Mobil::find($id);
        $mobil->delete();
        return redirect()->route('mobil.index')->with(['sucsess' => 'Mobil berhasil dihapus!']);
    }
}
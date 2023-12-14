<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ulasan;


class UlasanController extends Controller
{
    public function indexUlasan(){
        $ulasan = Ulasan::with('user')->latest()->paginate(5);
        return view('User.ulasan.ulasan', compact('ulasan'));
    }

    public function create(Request $request){
        try{
            $validate = $request->validate([
                'rating' => 'required',
                'ulasan' => 'required|max:255',
            ]);
        }catch(\Exception $e){
            return redirect()->back()->with('error', 'Ulasan gagal ditambahkan : ' . $e->getMessage());
        }

        $validate['id_user'] = auth()->user()->id_user;
        $validate['tanggal'] = date('Y-m-d');

        Ulasan::create($validate);

        return redirect()->back()->with('success', 'Ulasan berhasil ditambahkan');
    }

    public function destroy($id){
        $ulasan = Ulasan::find($id);
        if(!$ulasan){
            return redirect()->back()->with('error', 'Ulasan Tidak Ditemukan');
        }

        $ulasan->delete();

        return redirect()->back()->with('success', 'Ulasan berhasil dihapus');
    }
}

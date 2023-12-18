<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ulasan;
use Illuminate\Validation\ValidationException;


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
        }catch(\Illuminate\Validation\ValidationException $e){
            $errors = $e->validator->errors();

            $errorMessage = 'Ulase gagal ditambahkan : ';

            foreach($errors->all() as $message){
                $errorMessage .= $message . "\n";
            }

            return redirect()->back()->with('error', $errorMessage);

            // return redirect()->back()->with('error', 'Ulasan gagal ditambahkan : ' . $e->getMessage());
        }

        $validate['id_user'] = auth()->user()->id_user;
        $validate['tanggal'] = date('Y-m-d');

        Ulasan::create($validate);

        return redirect()->back()->with('success', 'Ulasan berhasil ditambahkan');
    }

    public function destroy(Request $request){
        $ulasan = Ulasan::find($request->id_ulasan);
        if(!$ulasan){
            return redirect()->back()->with('error', 'Ulasan Tidak Ditemukan');
        }

        $ulasan->delete();

        return redirect()->back()->with('success', 'Ulasan berhasil dihapus');
    }
}

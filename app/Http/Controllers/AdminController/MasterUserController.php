<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class MasterUserController extends Controller
{
    public function indexUser()
    {
        $data_user = User::where('role', '=', 'customer')->paginate(10);
        return view('Admin.dataUser.data-user', compact('data_user'));
    }

    public function cariUser(Request $request)
    {
        $cari = $request->cari;
        if ($cari == null) {
            return redirect()->route('data-user');
        }
        $data_user = User::where('role', '=', 'customer')
            ->where(function ($query) use ($cari) {
                $query->where('nama', 'like', "%$cari%")
                    ->orWhere('username', 'like', "%$cari%")
                    ->orWhere('email', 'like', "%$cari%")
                    ->orWhere('no_telp', 'like', "%$cari%")
                    ->orWhere('alamat', 'like', "%$cari%");
            })
            ->paginate(10);
        return view('Admin.dataUser.data-user', compact('data_user'));
    }
}

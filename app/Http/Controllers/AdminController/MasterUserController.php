<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

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

    public function editUser($id_user)
    {
        $user = User::find($id_user);
        return view('Admin.dataUser.edit-user', compact('user'));
    }

    public function actionEditUser(Request $request, $id_user)
    {
        $data_user = User::find($id_user);
        if(!$data_user){
            return redirect()->route('data-user')->with('error', 'Data User Tidak Ditemukan');
        }

        $validate = $request->validate([
            'nama' => 'required',
            'username' => 'required|unique:users,username,' . $id_user . ',id_user',
            'email' => 'required|unique:users,email,' . $id_user . ',id_user',
            'no_telp' => 'required|starts_with:08',
            'alamat' => 'required',
        ]);

        $data_user->update([
            'nama' => $request->nama,
            'username' => $request->username,
            'email' => $request->email,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('data-user')->with('success', 'Data User Berhasil Diubah');
    }

    public function deleteUser(Request $request){
        $user = User::find($request->id_user);
        if(!$user){
            return redirect()->back()->with('error', 'Data User Tidak Ditemukan');
        }

        if($user->photo != null){
            $uploadeFolder = 'profileUser';
            Storage::delete('/public/' . $uploadeFolder . '/' . $user->photo);
        }
        $user->delete();

        return redirect()->back()->with('success', 'User Berhasil Dihapus');
    }
}

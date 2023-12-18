<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function index(){
        $users = User::all()->paginate(10);
    }

    public function updatePhoto(Request $request, $id){
        $user = User::find($id);
        if(!$user){
            return redirect()->back()->with('error', 'User not found');
        }

        try{
            $validate = $request->validate([
                'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);
        }catch(\Exception $e){
            return redirect()->back()->with('error', 'Foto profile gagal diubah : ' . $e->getMessage());
        }

        $uploadFolder = 'profileUser';
        $photo = $request->file('photo');
        $photo_path = $photo->store($uploadFolder, 'public');
        $uploadPhotoResponse = basename($photo_path);

        if($user->photo != null){
            Storage::delete('/public/'.$uploadFolder.'/'.$user->photo);
        }

        $validate['photo'] = $uploadPhotoResponse;
        $user->update($validate);

        return redirect('profile')->with('success', 'Foto profile berhasil diubah');
    }

    public function updatePassword(Request $request, $id){
        $user = User::find($id);
        if(!$user){
            return redirect()->back()->with('error', 'User not found');
        }

        try{
            $validate = $request->validate([
                'old_password' => ['required', 'string', 'min:6', function($attribute, $value, $fail) use ($user){
                    if(!Hash::check($value, $user->password)){
                        return $fail(__('The current password is incorrect'));
                    }
                }],
                'new_password' => 'required|string|min:6|different:old_password',
                'confirm_new_password' => 'required|string|min:6|same:new_password',
            ]);
        }catch(\Illuminate\Validation\ValidationException $e){
            $errors = $e->validator->errors();

            $errorMessage = 'Password gagal diubah: ';

            foreach($errors->all() as $message){
                $errorMessage .= $message . "\n";
            }

            return redirect('profile')->with('error', $errorMessage);
            
            // return redirect('profile')->with('error', 'Password gagal diubah : ' . $e->getMessage());
        }

        $validate['password'] = Hash::make($validate['new_password']);
        $user->update($validate);

        return redirect('profile')->with('success', 'Password berhasil diubah');
    }

    public function updateDataUser(Request $request, $id){
        $user = User::find($id);
        if(!$user){
            return redirect()->back()->with('error', 'User not found');
        }

        try{
            $validate = $request->validate([
                'nama' => 'required',
                'username' => 'required|unique:users,username,'.$user->id_user.',id_user|max:32',
                'email' => 'required|unique:users,email,'.$user->id_user.',id_user',
                'alamat' => 'required',
                'no_telp' => 'required|starts_with:08',
            ]);
        }catch(\Illuminate\Validation\ValidationException $e){
            $errors = $e->validator->errors();

            $errorMessage = 'Data gagal diubah: ';

            foreach($errors->all() as $message){
                $errorMessage .= $message . "\n";
            }

            return redirect('profile')->with('error', $errorMessage);
            
            // return redirect('profile')->with('error', 'Data gagal diubah : ' . $e->getMessage());
        }

        $user->update($validate);

        return redirect('profile')->with('success', 'Data berhasil diubah');
    }
}

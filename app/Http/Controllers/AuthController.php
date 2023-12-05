<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;


class AuthController extends Controller
{
    public function login(Request $request){
        if(Auth::check()){
            $user = Auth::user();
            if($user->role == 'customer'){
                return redirect('/');
            }else {
                // return redirect('/admin');
            }
        }else{
            return view('/login');
        }
    }

    public function actionLogin (Request $request){
        $userData = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        if(Auth::attempt($userData)){
            $user = Auth::user();
            // dd(Auth::check());
            if($user->role == 'customer' && $user->status == 1){
                return redirect('/');
            // }else if($user->role == 'admin' && $user->status == 1){
            //     return redirect('/admin');
            }else{
                Auth::logout();
                Session::flash('error', 'Akun anda belum aktif');
                return redirect('login');
            }
        }else{
            Session::flash('error', 'Email atau password salah');
            return redirect('login');
        }
    }

    function actionLogout () {
        Auth::logout();
        return redirect('/');
    }
}

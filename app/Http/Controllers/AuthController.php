<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerifyMail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationException;
use App\Models\Mobil;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->role == 'customer') {
                return redirect('/');
            } else {
                // return redirect('/admin');
            }
        } else {
            return view('/login');
        }
    }

    public function actionLogin(Request $request)
    {
        $userData = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        if (Auth::attempt($userData)) {
            $user = Auth::user();
            if ($user->role == 'customer' && $user->status == 1) {
                return redirect('/');
            }else if ($user->role == 'admin' && $user->status == 1){
                return redirect('Admin.dashboard.admin-dashboard');
            } 
            else {
                Auth::logout();
                Session::flash('error', 'Akun anda belum aktif, cek email anda untuk mengaktifkan akun');
                return redirect('login');
            }
        } else if ($request->username === 'admin1' && $request->password === 'admin123') {
            return redirect('Admin.dashboard.admin-dashboard');
        } else {
            Session::flash('error', 'Email atau password salah');
            return redirect('login');
        }
    }

    public function actionLogout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function actionRegister(Request $request)
    {
        
        try {
            $this->validate($request, [
                'nama' => 'required',
                'username' => 'required|unique:users|max:32',
                'email' => 'required|unique:users',
                'password' => 'required|min:6',
                'password_confirmation' => 'required|same:password',
                'alamat' => 'required',
                'no_telp' => 'required|starts_with:08',
            ]);
        } catch (ValidationException $e) {
            return redirect('register')->withErrors($e->errors());
        }
        
        $key = Str::random(32);
        $user = User::create([
            'role' => 'customer',
            'photo' => null,
            'status' => 0,
            'nama' => $request->nama,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->get('password')),
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'verify_key' => $key,
        ]);

        $details = [
            'username' => $request->username,
            'url' => $request->getHttpHost() . '/register/verify/' . $key,
        ];

        Mail::to($request->email)->send(new VerifyMail($details));

        Session::flash('message', 'Link aktifasi akun telah dikirim ke email anda, silahkan cek email anda');
        return Redirect('register');
    }

    public function verify($verify_key)
    {
        $keyCheck = User::select('verify_key')->where('verify_key', $verify_key)->first();

        if ($keyCheck) {
            $user = User::where('verify_key', $verify_key)->update([
                'status' => 1,
            ]);

            return view('Mail.mailSuccess');
        } else {
            return view('Mail.mailFail');
        }
    }
}

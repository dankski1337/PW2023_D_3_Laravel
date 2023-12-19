<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Mobil;
use App\Models\RentalTransaksi;
use App\Models\Ulasan;


class MasterAdminController extends Controller
{
    public function adminLogin()
    {
        $user = User::where('role', '!=', 'admin')->get();
        $mobil = Mobil::all();
        $transaksi = RentalTransaksi::all();
        $ulasan = Ulasan::latest()->paginate(10);
        return view('Admin.landingPage.landing-page-admin', compact('user', 'mobil', 'transaksi', 'ulasan'));
    }
}

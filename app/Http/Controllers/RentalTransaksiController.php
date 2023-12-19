<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RentalTransaksi;
use App\Models\Mobil;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use DateTime;


class RentalTransaksiController extends Controller
{
    public function index()
    {
        return view('rental_transaksi.index');
    }

    public function sendTransaksiToSelectMobil(Request $request)
    {
        try {
            $validate = $request->validate([
                // 'id_mobil' => 'required',
                // 'id_user' => 'required',
                'lokasi_pengambilan' => 'required|max:255',
                'tanggal_pengambilan' => 'required',
                'jam_pengambilan' => 'required',
                'tanggal_pengembalian' => 'required',
                'jam_pengembalian' => 'required',
                // 'status' => 'required',
                // 'denda' => 'required|numeric|gt:0',
                // 'total_harga' => 'required|numeric|gt:0',
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

        // $validate['id_user'] = Auth::user()->id_user;
        // $validate['status'] = "Belum Dibayar";
        // $validate['denda'] = 0;

        // hitung total harga
        // $tanggalAmbil = new DateTime($validate['tanggal_pengambilan']);
        // $tanggalKembali = new DateTime($validate['tanggal_pengembalian']);
        // $lamaSewa = $tanggalKembali->diff($tanggalAmbil)->days;
        // $tarifMobil = Mobil::find($validate['id_mobil'])->tarif;
        // $validate['total_harga'] = $tarifMobil * $lamaSewa;

        // deadline dengan tanggalkembali + 3 hari
        // $deadline = new DateTime($validate['tanggal_pengembalian']);
        // $deadline->modify('+3 day');
        // $validate['deadline_pembayaran'] = $deadline->format('Y-m-d');

        $mobil = Mobil::latest()->paginate(6);
        return view('User.mobil.list-mobil-select', compact('validate', 'mobil'));
    }

    public function sendTransaksiToConfirm(Request $request)
    {
        try {
            $validate = $request->validate([
                'id_mobil' => 'required',
                'lokasi_pengambilan' => 'required|max:255',
                'tanggal_pengambilan' => 'required',
                'jam_pengambilan' => 'required',
                'tanggal_pengembalian' => 'required',
                'jam_pengembalian' => 'required',
                // 'status' => 'required',
                // 'denda' => 'required|numeric|gt:0',
                // 'total_harga' => 'required',
                // 'deadline_pembayaran' => 'required',
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

        $mobil = Mobil::find($validate['id_mobil']);

        // $validate['id_user'] = Auth::user()->id_user;
        // $validate['status'] = "Belum Dibayar";
        // $validate['denda'] = 0;

        // hitung total harga
        $tanggalAmbil = new DateTime($validate['tanggal_pengambilan']);
        $tanggalKembali = new DateTime($validate['tanggal_pengembalian']);
        $lamaSewa = $tanggalKembali->diff($tanggalAmbil)->days;
        $tarifMobil = $mobil->tarif;
        $validate['total_harga'] = $tarifMobil * $lamaSewa;

        // // deadline dengan tanggalkembali + 3 hari
        // $deadline = new DateTime($validate['tanggal_pengembalian']);
        // $deadline->modify('+3 day');
        // $validate['deadline_pembayaran'] = $deadline->format('Y-m-d');

        // $mobil = Mobil::find($validate['id_mobil']);
        // $mobil->update([
        //     'status' => 'Tidak Tersedia'
        // ]);

        return view('User.transaksi.confirm-transaksi', compact('mobil', 'validate'));
    }

    public function createTransaksi(Request $request)
    {
        try {
            $validate = $request->validate([
                'id_mobil' => 'required',
                'lokasi_pengambilan' => 'required|max:255',
                'tanggal_pengambilan' => 'required',
                'jam_pengambilan' => 'required',
                'tanggal_pengembalian' => 'required',
                'jam_pengembalian' => 'required',
                // 'status' => 'required',
                // 'denda' => 'required|numeric|gt:0',
                'total_harga' => 'required',
                // 'deadline_pembayaran' => 'required',
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
        $validate['id_user'] = Auth::user()->id_user;
        $validate['status'] = "Belum Dibayar";
        $validate['denda'] = 0;

        // deadline dengan tanggalkembali + 3 hari
        $deadline = new DateTime($validate['tanggal_pengembalian']);
        $deadline->modify('+3 day');
        $validate['deadline_pembayaran'] = $deadline->format('Y-m-d');

        $transaksi = RentalTransaksi::create($validate);
        if (!$transaksi) {
            return redirect()->back()->with('error', 'Transaksi gagal ditambahkan');
        }

        $mobil = Mobil::find($validate['id_mobil']);
        $mobil->update([
            'status' => 'Tidak Tersedia'
        ]);

        return redirect()->route('transaksi.detail', $transaksi->id_rental_transaksi)->with('success', 'Transaksi berhasil dibuat!');
    }

    public function detailTransaksi($id){
        $transaksi = RentalTransaksi::with('mobil')->find($id);
        if(!$transaksi){
            return redirect()->back()->with('error', 'Transaksi tidak ditemukan');
        }

        return view('User.transaksi.detail-transaksi', compact('transaksi'));
    }

    public function getTransaksiByUser() {
        $transaksi = RentalTransaksi::with('mobil')->where('id_user', Auth::user()->id_user)->latest()->paginate(10);
        return view('User.transaksi.riwayat-transaksi', compact('transaksi'));
    }

    public function cariTransaksi(Request $request) {
        $cari = $request->cari;
        if($cari == null){
            return redirect()->route('transaksi.riwayat');
        }
        $transaksi = RentalTransaksi::where('id_user', Auth::user()->id_user)
            ->where('id_rental_transaksi', 'like', "%$cari%")
            ->orWhereHas('mobil', function ($query) use ($cari) {
                $query->where('model', 'LIKE', "%$cari%");
            })
            ->orWhere('lokasi_pengambilan', 'LIKE', "%$cari%")
            ->orWhere('tanggal_pengambilan', 'LIKE', "%$cari%")
            ->orWhere('jam_pengambilan', 'LIKE', "%$cari%")
            ->orWhere('tanggal_pengembalian', 'LIKE', "%$cari%")
            ->orWhere('jam_pengembalian', 'LIKE', "%$cari%")
            ->orWhere('status', 'LIKE', "%$cari%")
            ->orWhere('total_harga', 'LIKE', "%$cari%")
            ->orWhere('deadline_pembayaran', 'LIKE', "%$cari%")
            ->paginate(10);

        return view('User.transaksi.riwayat-transaksi', compact('transaksi'));
    }
}

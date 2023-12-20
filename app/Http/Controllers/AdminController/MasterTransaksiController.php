<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mobil;
use App\Models\RentalTransaksi;
use App\Models\User;
use DateTime;

class MasterTransaksiController extends Controller
{
    public function indexTransaksi()
    {
        $data_transaksi = RentalTransaksi::with('mobil', 'user')->latest()->paginate(10);
        return view('Admin.dataTransaksi.data-transaksi', compact('data_transaksi'));
    }

    public function cariTransaksi(Request $request)
    {
        $cari = $request->cari;
        if ($cari == null) {
            return redirect()->route('data-transaksi');
        }
        $data_transaksi = RentalTransaksi::where('id_rental_transaksi', 'like', "%$cari%")
            ->orWhereHas('mobil', function ($query) use ($cari) {
                $query->where('model', 'LIKE', "%$cari%");
            })
            ->orWhereHas('user', function ($query) use ($cari) {
                $query->where('nama', 'LIKE', "%$cari%");
            })
            ->orWhere('lokasi_pengambilan', 'like', "%$cari%")
            ->orWhere('tanggal_pengambilan', 'like', "%$cari%")
            ->orWhere('jam_pengambilan', 'like', "%$cari%")
            ->orWhere('tanggal_pengembalian', 'like', "%$cari%")
            ->orWhere('jam_pengembalian', 'like', "%$cari%")
            ->orWhere('denda', 'like', "%$cari%")
            ->orWhere('total_harga', 'like', "%$cari%")
            ->orWhere('status', 'like', "%$cari%")
            ->orWhere('deadline_pembayaran', 'like', "%$cari%")
            ->paginate(10);
        return view('Admin.dataTransaksi.data-transaksi', compact('data_transaksi'));
    }

    public function tambahTransaksi(){
        $user = User::where('role', '=', 'customer')->get();
        $mobil = Mobil::where('status', '=', 'Tersedia')->get();
        return view('Admin.dataTransaksi.input-transaksi', compact('user', 'mobil'));
    }

    public function actionTambahTransaksi(Request $request){
        $validate = $request->validate([
            'id_mobil' => 'required',
            'id_user' => 'required',
            'lokasi_pengambilan' => 'required',
            'tanggal_pengambilan' => 'required',
            'jam_pengambilan' => 'required',
            'tanggal_pengembalian' => 'required',
            'jam_pengembalian' => 'required',
        ]);

        $validate['status'] = 'Belum Dibayar';
        $validate['denda'] = 0;

        // hitung total harga
        $mobil = Mobil::find($validate['id_mobil']);
        $tanggalAmbil = new DateTime($validate['tanggal_pengambilan']);
        $tanggalKembali = new DateTime($validate['tanggal_pengembalian']);
        $lamaSewa = $tanggalKembali->diff($tanggalAmbil)->days;
        $tarifMobil = $mobil->tarif;
        $validate['total_harga'] = $tarifMobil * $lamaSewa;

        // deadline dengan tanggalkembali + 3 hari
        $deadline = new DateTime($validate['tanggal_pengembalian']);
        $deadline->modify('+3 day');
        $validate['deadline_pembayaran'] = $deadline->format('Y-m-d');

        $mobil->update([
            'status' => 'Tidak Tersedia'
        ]);

        RentalTransaksi::create($validate);

        return redirect()->route('data-transaksi')->with('success', 'Transaksi berhasil ditambahkan');
    }

    public function editTransaksi($id){
        $user = User::where('role', '=', 'customer')->get();
        $mobil = Mobil::all();
        $transaksi = RentalTransaksi::find($id);
        return view('Admin.dataTransaksi.edit-transaksi', compact('transaksi','user', 'mobil'));
    }

    public function actionEditTransaksi(Request $request, $id){
        $transaksi = RentalTransaksi::find($id);
        if(!$transaksi){
            return redirect()->route('data-transaksi')->with('error', 'Data Transaksi Tidak Ditemukan');
        }

        $validate = $request->validate([
            'id_mobil' => 'required',
            'lokasi_pengambilan' => 'required',
            'tanggal_pengambilan' => 'required',
            'jam_pengambilan' => 'required',
            'tanggal_pengembalian' => 'required',
            'jam_pengembalian' => 'required',
            'denda' => 'required|gt:-1',
        ]);

        // hitung total harga
        $mobil = Mobil::find($validate['id_mobil']);
        $tanggalAmbil = new DateTime($validate['tanggal_pengambilan']);
        $tanggalKembali = new DateTime($validate['tanggal_pengembalian']);
        $lamaSewa = $tanggalKembali->diff($tanggalAmbil)->days;
        $tarifMobil = $mobil->tarif;
        $validate['total_harga'] = ($tarifMobil * $lamaSewa) + $validate['denda'];

        // deadline dengan tanggalkembali + 3 hari
        $deadline = new DateTime($validate['tanggal_pengembalian']);
        $deadline->modify('+3 day');
        $validate['deadline_pembayaran'] = $deadline->format('Y-m-d');

        $transaksi->update($validate);
        return redirect()->route('data-transaksi')->with('success', 'Transaksi berhasil diubah');
    }

    public function actionEditStatusTransaksi(Request $request){
        $transaksi = RentalTransaksi::find($request->id_rental_transaksi);
        if(!$transaksi){
            return redirect()->route('data-transaksi')->with('error', 'Data Transaksi Tidak Ditemukan');
        }

        if($transaksi->status == 'Belum Dibayar'){
            $transaksi->update([
                'status' => 'Sudah Dibayar',
            ]);
        }else{
            $transaksi->update([
                'status' => 'Belum Dibayar',
            ]);
        }

        return redirect()->route('data-transaksi')->with('success', 'Status Transaksi Berhasil Diubah');
    }

    public function deleteTransaksi(Request $request){
        $transaksi = RentalTransaksi::find($request->id_rental_transaksi);
        if(!$transaksi){
            return redirect()->route('data-transaksi')->with('error', 'Data Transaksi Tidak Ditemukan');
        }

        $transaksi->delete();

        return redirect()->route('data-transaksi')->with('success', 'Data Transaksi Berhasil Dihapus');

    }
}

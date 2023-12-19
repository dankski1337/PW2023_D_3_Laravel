<?php

namespace App\Http\Controllers\AdminController;

use Illuminate\Http\Request;
use App\Models\RentalTransaksi;
use App\Models\Mobil;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use DateTime;
use Illuminate\Validation\ValidationException;

class RentalTransaksiController extends AdminController{
    public function indexRental(){
        $transaksi = RentalTransaksi::all()->paginate(10);
        return view('rental_transaksi.index');
    }

    /**
     * create
     * 
     */
    public function createTransaksi(Request $request){
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

    /**
     * update
     * 
     * @param mixed $request
     * @param int $id
     * @return void
     */
    public function updateTransaksi(Request $request, $id){
        $transaksi = RentalTransaksi::find($id);

        $this->validate($request, [
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

        $transaksi->updateTransaksi([
            'id_mobil' => $request->id_mobil,
            'lokasi_pengambilan' => $request->lokasi_pengambilan,
            'tanggal_pengambilan' => $request->jam_pengambilan,
            'jam_pengambilan' => $request->jam_pengambilan,
            // 'status' => $request->status,
            // 'denda' => $request->denda,
            'total_harga' => $request->total_harga,
            // 'deadline_pembayaran' => $request->deadline_pembayaran
        ]);

        return redirect()->route('transaksi.index')->with(['success' => 'Data berhasil diubah!']);
    }

    /**
     * destroy
     * 
     * @param int $id
     * @return void
     */
    public function destroyTransaksi($id){
        $transaksi = RentalTransaksi::find($id);
        $transaksi->delete();
        return redirect()->route('transaksi.index')->with(['success' => 'Transaksi berhasil dihapus!']);
    }
}
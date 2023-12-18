<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rental_transaksis', function (Blueprint $table) {
            $table->id('id_rental_transaksi');
            $table->foreignId('id_mobil')->constrained('mobils', 'id_mobil');
            $table->foreignId('id_user')->constrained('users', 'id_user');
            $table->string('lokasi_pengambilan');
            $table->date('tanggal_pengambilan');
            $table->time('jam_pengambilan');
            $table->date('tanggal_pengembalian');
            $table->time('jam_pengembalian');
            $table->string('status');
            $table->integer('denda');
            $table->integer('total_harga');
            $table->date('deadline_pembayaran');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rental_transaksis');
    }
};

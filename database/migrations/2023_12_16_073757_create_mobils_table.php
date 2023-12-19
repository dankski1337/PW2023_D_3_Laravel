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
        Schema::create('mobils', function (Blueprint $table) {
            $table->id('id_mobil');
            $table->string('gambar');
            $table->string('model');
            $table->string('bahan_bakar');
            $table->string('transmisi');
            $table->integer('jumlah_kursi');
            $table->integer('tahun_produksi');
            $table->string('warna');
            $table->integer('tarif');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mobils');
    }
};

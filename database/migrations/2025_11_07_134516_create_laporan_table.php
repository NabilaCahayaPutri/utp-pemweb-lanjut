<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('laporan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('nama_barang');
            $table->text('deskripsi');
            $table->string('nomor_telepon');
            $table->string('lokasi');
            $table->date('tanggal');
            $table->string('foto')->nullable();
            $table->enum('jenis_laporan', ['Barang Hilang', 'Barang Ditemukan']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('laporan');
    }
};

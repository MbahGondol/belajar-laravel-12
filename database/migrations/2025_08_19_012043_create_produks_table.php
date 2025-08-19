<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Method ini dijalankan saat migration di-*migrate*.
     */
    public function up(): void
    {
        // Membuat tabel baru dengan nama 'tb_produk'
        Schema::create('tb_produk', function (Blueprint $table) {
            $table->id('id_produk'); 
            // Membuat kolom primary key dengan nama 'id_produk'
            // Defaultnya jika pakai ->id() saja akan membuat kolom 'id'

            $table->string('nama_produk', 150); 
            // Membuat kolom 'nama_produk' dengan tipe VARCHAR(150)
            // Default string di Laravel = VARCHAR(255)

            $table->integer('harga'); 
            // Membuat kolom harga dengan tipe INT (bilangan bulat)

            $table->text('deskripsi_produk'); 
            // Membuat kolom deskripsi_produk dengan tipe TEXT (bisa menampung teks panjang)

            $table->integer('kategori_id'); 
            // Membuat kolom kategori_id dengan tipe INT
            // Biasanya digunakan untuk relasi ke tabel kategori

            $table->timestamps(); 
            // Membuat 2 kolom otomatis: created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     * Method ini dijalankan saat migration di-*rollback*.
     */
    public function down(): void
    {
        // Menghapus tabel jika ada. 
        Schema::dropIfExists('produks');
    }
};

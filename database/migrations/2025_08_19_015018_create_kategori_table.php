<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Method ini dijalankan saat perintah `php artisan migrate`.
     */
    public function up(): void
    {
        // Membuat tabel baru dengan nama 'kategori'
        Schema::create('kategori', function (Blueprint $table) {
            $table->id('id_kategori'); 
            // Membuat kolom primary key bernama 'id_kategori' (auto increment)

            $table->string('nama_kategori', 100); 
            // Kolom 'nama_kategori' dengan tipe VARCHAR(100) 
            // untuk menyimpan nama kategori produk

            $table->text('deskripsi'); 
            // Kolom 'deskripsi' dengan tipe TEXT
            // untuk menyimpan deskripsi kategori secara panjang

            $table->timestamps(); 
            // Membuat kolom otomatis 'created_at' & 'updated_at'
        });
    }

    /**
     * Reverse the migrations.
     * Method ini dijalankan saat perintah `php artisan migrate:rollback`.
     */
    public function down(): void
    {
        // Menghapus tabel 'kategori' jika ada (rollback)
        Schema::dropIfExists('kategori');
    }
};
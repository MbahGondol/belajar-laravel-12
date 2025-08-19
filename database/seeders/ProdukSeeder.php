<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Method ini dijalankan saat kita melakukan `php artisan db:seed`
     * atau `php artisan db:seed --class=ProdukSeeder`
     */
    public function run(): void
    {
        // Memasukkan data awal (dummy data) ke tabel 'tb_produk'
        DB::table('tb_produk')->insert([
            // Data produk pertama
            [
                'nama_produk'       => 'PC Gaymink', 
                'harga'             => 30000000, 
                'deskripsi_produk'  => 'Ini adalah sebuah deskripsi untuk sebuah produk',
                'kategori_id'       => '2', 
                'created_at'        => now(), // otomatis isi dengan waktu saat ini
                'updated_at'        => now()
            ],

            // Data produk kedua
            [
                'nama_produk'       => 'Laptop Bekas Ani-Ani',
                'harga'             => 100000000,
                'deskripsi_produk'  => 'Ini adalah sebuah deskripsi untuk sebuah produk',
                'kategori_id'       => '2',
                'created_at'        => now(),
                'updated_at'        => now()
            ],

            // Data produk ketiga
            [
                'nama_produk'       => 'Laptop Gaymink',
                'harga'             => 50000000,
                'deskripsi_produk'  => 'Ini adalah sebuah deskripsi untuk sebuah produk',
                'kategori_id'       => '2',
                'created_at'        => now(),
                'updated_at'        => now()
            ]
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * Method ini otomatis dijalankan ketika kita menjalankan:
     *   php artisan db:seed
     */
    public function run(): void
    {
        // Contoh bawaan Laravel untuk membuat 10 data user dummy (pakai factory).
        // Saat ini dikomentari, jadi tidak dijalankan.
        // User::factory(10)->create();

        // Menjalankan seeder ProdukSeeder
        // Artinya data dari ProdukSeeder (tb_produk) akan dimasukkan ke database
        $this->call(ProdukSeeder::class);
    }
}
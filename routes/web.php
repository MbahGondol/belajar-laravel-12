<?php

// Mengimpor facade Route dari Laravel untuk mendefinisikan rute aplikasi

use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Route;

// Mendefinisikan rute GET untuk URL '/' (root), mengembalikan view 'pages.beranda'
Route::get('/', function () {
    // Mengembalikan tampilan halaman beranda
    return view('pages.beranda');
});

// Mendefinisikan rute GET untuk URL '/about', mengembalikan view 'pages.about' dengan data
Route::get('/about', function (){
    // Mengembalikan tampilan halaman about dengan data nama, umur, dan alamat
    return view('pages.about', [
        'nama' => 'MbahGondol', // Nama yang dikirim ke view
        'umur' => 10000,        // Umur yang dikirim ke view
        'alamat' => 'Sidoarjo', // Alamat yang dikirim ke view
    ]);
});

// Mendefinisikan rute view langsung untuk URL '/contact', mengembalikan view
Route::view('/contact', 'pages.contact');
Route::get('/product', [ProdukController::class, 'index']);
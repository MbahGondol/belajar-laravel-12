<?php

// Mengimpor facade Route dari Laravel untuk mendefinisikan rute aplikasi
use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| File ini berisi definisi semua rute aplikasi web.
| Rute-rute di sini akan di-load oleh RouteServiceProvider.
*/

// Rute untuk URL root '/' → menampilkan view 'pages.beranda'
Route::get('/', function () {
    // Mengembalikan tampilan halaman beranda
    return view('pages.beranda');
});

// Rute untuk URL '/about' → menampilkan view 'pages.about' dengan data tambahan
Route::get('/about', function (){
    // Mengembalikan tampilan halaman about beserta data yang dikirim
    return view('pages.about', [
        'nama'   => 'MbahGondol', // Data nama yang dikirim ke view
        'umur'   => 10000,        // Data umur yang dikirim ke view
        'alamat' => 'Sidoarjo',   // Data alamat yang dikirim ke view
    ]);
});

// Rute untuk URL '/contact' → langsung menampilkan view 'pages.contact' tanpa closure
Route::view('/contact', 'pages.contact');

/*
|--------------------------------------------------------------------------
| Rute Produk (menggunakan Controller)
|--------------------------------------------------------------------------
| Bagian ini untuk mengelola produk, menggunakan ProdukController
*/

// Rute untuk URL '/product' → memanggil method index di ProdukController
// Biasanya digunakan untuk menampilkan daftar produk (READ data)
Route::get('/product', [ProdukController::class, 'index']);

// Rute untuk URL '/product/tambah' → memanggil method tambahProduk di ProdukController
// Biasanya digunakan untuk menampilkan form tambah produk (CREATE data)
Route::get('/product/create', [ProdukController::class, 'create']);

Route::post('/product',[ProdukController::class, 'store']); // untuk mengelola data yang telah dikirim dari halaman form data

Route::get('/product/{id}',[ProdukController::class,'show']); // untuk menampilkan detail produk berdasarkan ID

Route::get('product/{id}/edit',[ProdukController::class, 'edit']); // untuk menampilkan form edit produk berdasarkan ID
Route::put('product/{id}',[ProdukController::class, 'update']); // untuk mengupdate data produk berdasarkan ID

Route::delete('product/{id}',[ProdukController::class, 'destroy']); // untuk menghapus produk berdasarkan ID
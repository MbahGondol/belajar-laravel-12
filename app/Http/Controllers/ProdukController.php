<?php

namespace App\Http\Controllers;  
// Menentukan namespace controller ini agar dikenali oleh Laravel
// Semua controller ada di folder App/Http/Controllers

use Illuminate\Http\Request;  
// Import class Request untuk mengambil data dari HTTP request (form, query string, dll)

use App\Models\produk;  
// Import model Produk (terhubung ke tabel tb_produk di database)

use Illuminate\Support\Facades\DB;  
// Import facade DB (opsional, bisa dipakai kalau ingin query manual dengan Query Builder)

class ProdukController extends Controller  
// Membuat class ProdukController yang mewarisi class Controller bawaan Laravel
{
    // ---------------------------
    // Method: index()
    // Menampilkan daftar semua produk
    // ---------------------------
    public function index(Request $request)
    {
        // Contoh data toko (bisa juga dari database, ini hanya dummy)
        $toko = [
            'nama_toko' => 'Narzavael Immortal',   // Nama toko
            'alamat'    => 'Surabaya, Jawa Timur', // Lokasi toko
            'type'      => 'Toko Guede'            // Jenis toko
        ];

        $search = $request->keyword;

        // Mengambil semua data produk dari tabel tb_produk pakai Eloquent ORM
        $produk = produk::when($search, function ($query, $search) {
            return $query->where('nama_produk', 'like', "%{$search}%")->orWhere('deskripsi_produk', 'like', "%{$search}%");
        })->get();


        // Alternatif lain (pakai Query Builder, tanpa model):
        // $queryBuilder = DB::table('tb_produk')->get();  

        // Mengirim data ke view "pages.produk.show"
        // Data yang dikirim: info toko dan daftar produk
        return view('pages.produk.show', [
            'data_toko'   => $toko,    // Dikirim ke view untuk ditampilkan
            'data_produk' => $produk,  // Semua data produk
        ]); 
    }

    // ---------------------------
    // Method: create()
    // Menampilkan halaman form tambah produk
    // ---------------------------
    public function create()
    {
        // View "pages.produk.add" berisi form input produk baru
        return view('pages.produk.add'); 
    }

    // ---------------------------
    // Method: store()
    // Menyimpan data produk baru dari form ke database
    // ---------------------------
    public function store(Request $request)
    {
        // Validasi input form
        $request->validate([
            'nama_produk'   => 'required|min:8|max:16', // Nama produk wajib, min 8, max 16 karakter
            'harga_produk'  => 'required',              // Harga wajib diisi
            'deskripsi'     => 'required',              // Deskripsi wajib diisi
        ], [
            // Pesan error kustom jika validasi gagal
            'nama_produk.required' => 'Nama produk harus diisi',
            'nama_produk.min'      => 'Nama produk minimal 8 karakter',
            'nama_produk.max'      => 'Nama produk maksimal 16 karakter',
            'harga_produk.required'=> 'Inputan Harga produk harus diisi',
            'deskripsi.required'   => 'Inputan Deskripsi produk harus diisi',
        ]);

        // Simpan data ke database menggunakan Eloquent ORM
        produk::create([
            'nama_produk'      => $request->nama_produk,      // Input dari user (form)
            'harga'            => $request->harga_produk,     // Input harga
            'deskripsi_produk' => $request->deskripsi,        // Input deskripsi
            'kategori_id'      => '1'                         // Default kategori (sementara hardcode)
        ]);

        // Setelah berhasil, redirect ke halaman daftar produk (/product)
        // Kirim juga flash message "Berhasil menambahkan data produk"
        return redirect('/product')->with('message', 'Berhasil menambahkan data produk');
    }

    // ---------------------------
    // Method: show($id)
    // Menampilkan detail 1 produk berdasarkan ID
    // ---------------------------
    public function show($id){
        // Cari produk berdasarkan ID
        // Kalau ID tidak ditemukan -> otomatis error 404
        $data = produk::findOrFail($id);

        // Kirim data produk ke view "pages.produk.detail"
        return view('pages.produk.detail', [
            'produk' => $data
        ]);
    }

    public function edit($id){
        // mengambil 1 data spesifik berdasarkan ID yag dikirimkan oleh parameter
        $data = produk::findOrFail($id); // Jika tidak ditemukan, otomatis error

        return view('pages.produk.edit', [
            'data' => $data // Mengirim data produk ke view untuk diedit
        ]);
    }

    
    public function update($id,Request $request){
        // Validasi input form
        $request->validate([
            'nama_produk'   => 'required|min:8', // Nama produk wajib, min 8
            'harga_produk'  => 'required',              // Harga wajib diisi
            'deskripsi'     => 'required',              // Deskripsi wajib diisi
        ], [
            // Pesan error kustom jika validasi gagal
            'nama_produk.required' => 'Nama produk harus diisi',
            'nama_produk.min'      => 'Nama produk minimal 8 karakter',
            'harga_produk.required'=> 'Inputan Harga produk harus diisi',
            'deskripsi.required'   => 'Inputan Deskripsi produk harus diisi',
        ]);

        //qurey untuk simpan data yang tealh kita update
        produk::where('id_produk', $id)->update([
            'nama_produk'      => $request->nama_produk,      // Input dari user (form)
            'harga'            => $request->harga_produk,     // Input harga
            'deskripsi_produk' => $request->deskripsi,        // Input deskripsi
            'kategori_id'      => '1'                         // Default kategori (sementara hardcode)
        ]);

        return redirect('product')->with('message', 'Berhasil mengupdate data produk');
        // Setelah berhasil, redirect ke halaman daftar produk (/product)
    }

    public function destroy($id){ # Fungsi untuk menghapus data produk berdasarkan ID yang diberikan
        $produk = produk::findOrFail($id); # Mencari data produk berdasarkan ID, jika tidak ditemukan akan error 404
        $produk->delete(); # Menghapus data produk dari database

        return redirect('/product')->with('message', 'Berhasil menghapus data produk'); # Redirect ke halaman daftar produk
    }
}
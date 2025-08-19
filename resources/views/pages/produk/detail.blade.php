@extends('layouts.master') 
<!-- Menggunakan layout utama 'master.blade.php' sebagai kerangka halaman utama -->

@section('konten') 
<!-- Membuka section 'konten' yang akan menggantikan yield('konten') di master layout -->

<!-- Judul halaman -->
<h1>Detail Produk</h1>
<!-- Heading utama halaman -->

<hr>
<!-- Garis horizontal sebagai pemisah visual -->

<div class="card">
  <!-- Membuat komponen card Bootstrap sebagai container produk -->

  <div class="card-header">
    <!-- Bagian header card -->
    Detail Produk 
    <!-- Tulisan yang muncul di bagian header card -->
  </div>

  <div class="card-body">
    <!-- Bagian isi card -->

     <!-- Menampilkan gambar produk -->
     <img src="https://upload.wikimedia.org/wikipedia/commons/a/ad/Tom_Morello_%2828%29_%2853816643962%29.jpg" 
          class="img-fluid" alt="...">
     <!-- Gambar produk dengan class Bootstrap 'img-fluid' supaya responsive -->

     <!-- Menampilkan data produk yang diambil dari variabel $produk -->
     <p>Nama Produk : {{ $produk->nama_produk }}</p>
     <!-- Output nama produk -->

     <p>Harga : {{ $produk->harga }}</p>
     <!-- Output harga produk -->

     <p>Deskripsi : {{ $produk->deskripsi_produk }}</p>
     <!-- Output deskripsi produk -->

     <p>Kategori : Barang Elektronik</p>
     <!-- Output kategori produk (sementara ditulis manual, bukan dari database) -->

     <p>Stok : Tersedia Tak Hingga</p>
     <!-- Output stok produk (sementara statis, bukan dari database) -->

  </div> <!-- End card-body -->
</div> <!-- End card -->

@endsection 
<!-- Menutup section konten -->
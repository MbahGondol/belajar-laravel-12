@extends('layouts.master') 
<!-- Menggunakan layout utama 'master.blade.php' sebagai kerangka halaman utama -->

@section('konten') 
<!-- Membuka section 'konten' yang akan menggantikan yield('konten') di master layout -->

<!-- Judul halaman -->
<h1>Daftar Produk Kami</h1>
<!-- Heading utama halaman -->

<hr>
<!-- Garis horizontal sebagai pemisah visual -->

<div class="alert alert-primary">
  <!-- Membuat alert Bootstrap dengan warna biru -->
  <b>Nama Toko : </b> {{$data_toko['nama_toko']}} <!-- Menampilkan nilai nama_toko dari array $data_toko -->
  <br>
  <b>Alamat : </b> {{$data_toko['alamat']}} <!-- Menampilkan nilai alamat dari array $data_toko -->
  <br>
  <b>Tipe Toko : </b> {{$data_toko['type']}} <!-- Menampilkan nilai type dari array $data_toko -->
  <br>
</div>

@if (session('message'))
  <div class="alert alert-primary">{{ session('message') }}</div>
@endif

<a href="/product/create" type="button" class="btn btn-primary mb-3">Tambah Data</a>
<!-- Tombol Bootstrap biru untuk pindah ke halaman tambah produk -->

<div class="card">
  <!-- Membuat komponen card Bootstrap sebagai container produk -->

  <div class="card-header d-flex justify-content-between align-items-center">
    <!-- Bagian header card -->
    Produk Terbaru Kami
    <div class="d-flex gap-2">
      <form method="GET" action="/product" class="input-group mb-3" style="width: 350px">
      <input type="text" name="keyword" class="form-control" placeholder="Cari data produk" value="{{ request('keyword') }}">
      <button class="btn btn-success" type="submit">Cari Data</button>
      @if (Request()->keyword != '')
      <a href="/product" class="btn btn-outline-info">Reset</a>
      @endif
</form>

    </div>
  </div>

  <div class="card-body">
    <!-- Bagian isi card -->

    <table class="table">
      <!-- Membuat tabel dengan style Bootstrap -->
      <thead>
        <tr>
          <!-- Baris header tabel -->
          <th scope="col">No</th>           <!-- Kolom nomor urut -->
          <th scope="col">Nama Produk</th>  <!-- Kolom nama produk -->
          <th scope="col">Harga</th>        <!-- Kolom harga produk -->
          <th scope="col">Deskripsi</th>    <!-- Kolom deskripsi produk -->
          <th scope="col">Aksi</th>         <!-- Kolom untuk tombol aksi -->
        </tr>
      </thead>

      <tbody>
      @forelse ($data_produk as $item )
      <tr>

        <th scope="row">{{ $loop->iteration }}</th>
        <td>{{ $item->nama_produk }}</td>
        <td>{{ $item->harga }}</td>
        <td>{{ $item->deskripsi_produk }}</td>
        <td>
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapus{{ $item->id_produk }}">
                Hapus
            </button>
            <a href="/product/{{ $item->id_produk }}/edit" class="btn btn-warning me-1">Edit</a>
            <a href="/product/{{ $item->id_produk }}" class="btn btn-info">Detail</a>

        </td>
      </tr> 
      @empty
      <tr>
        <td colspan="5" class="text-center">Data Yang Anda Cari Tidak Ada!!</td>
      </tr>
      @endforelse
    </tbody>
    </table>

  </div> <!-- End card-body -->
</div> <!-- End card -->

@endsection 
<!-- Menutup section konten -->

<!-- Modal Konfirmasi Hapus Produk -->
@foreach ($data_produk as $item) 
    <!-- Looping setiap produk di dalam $data_produk -->

<div class="modal fade" 
     id="hapus{{ $item->id_produk }}"  <!-- ID unik modal berdasarkan id_produk -->
     data-bs-backdrop="static"        <!-- Modal tidak bisa ditutup dengan klik di luar -->
     data-bs-keyboard="false"         <!-- Modal tidak bisa ditutup dengan tombol ESC -->
     tabindex="-1" 
     aria-labelledby="staticBackdropLabel" 
     aria-hidden="true">
  
  <div class="modal-dialog"> <!-- Container dialog modal -->

    <!-- Form untuk menghapus produk -->
    <form action="/product/{{ $item->id_produk }}" method="POST" class="modal-content">
      @csrf               <!-- Token keamanan Laravel (Cross-Site Request Forgery protection) -->
      @method('DELETE')   <!-- Ubah method POST menjadi DELETE -->

      <div class="modal-header">
        <!-- Judul modal -->
        <h1 class="modal-title" id="staticBackdropLabel">Konfirmasilah Pukimai!!</h1>
        
        <!-- Tombol close (X) untuk menutup modal -->
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <!-- Isi pesan konfirmasi dengan nama produk -->
        Apakah Anda yakin ingin menghapus data produk ini <b>{{ $item->nama_produk }}</b>??
      </div>

      <div class="modal-footer">
        <!-- Tombol batal (tidak jadi hapus) -->
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>

        <!-- Tombol submit (eksekusi hapus data) -->
        <button type="submit" class="btn btn-danger">Hapus Data</button>
      </div>
    </form>
  </div>
</div>
@endforeach

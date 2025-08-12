@extends('layouts.master')
<!-- Menggunakan layout utama 'master.blade.php' sebagai kerangka halaman -->

@section('konten')
<!-- Mengisi section 'konten' yang didefinisikan di layout master -->

  <!-- Judul halaman -->
  <h1>Daftar Produk Kami</h1>

  <!-- Garis horizontal pemisah -->
  <hr>

  <!-- Tombol untuk menambahkan data produk baru -->
  <button type="button" class="btn btn-primary mb-3">Tambah Data</button>

  <!-- Kartu Bootstrap untuk membungkus daftar produk -->
  <div class="card">

    <!-- Bagian header card -->
    <div class="card-header">
      Produk Terbaru Kami
    </div>

    <!-- Bagian isi card -->
    <div class="card-body">

      <!-- Tabel daftar produk -->
      <table class="table">
        <thead>
          <tr>
            <!-- Header kolom tabel -->
            <th scope="col">No</th>
            <th scope="col">Nama Produk</th>
            <th scope="col">Stok</th>
            <th scope="col">Harga</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>

        <tbody>
          <!-- Baris data produk -->
          <tr>
            <th scope="row">1</th> <!-- Nomor urut -->
            <td>Aqua</td>          <!-- Nama produk -->
            <td>100</td>           <!-- Stok produk -->
            <td>5000</td>          <!-- Harga produk -->
            <td>
              <!-- Tombol aksi hapus -->
              <button type="button" class="btn btn-danger">Hapus</button>
              <!-- Tombol aksi edit -->
              <button type="button" class="btn btn-warning">Edit</button>
            </td>
          </tr>

          <!-- Baris data ke-2 -->
          <tr>
            <th scope="row">2</th>
            <td>Aqua</td>
            <td>100</td>
            <td>5000</td>
            <td>
              <button type="button" class="btn btn-danger">Hapus</button>
              <button type="button" class="btn btn-warning">Edit</button>
            </td>
          </tr>

          <!-- Baris data ke-3 -->
          <tr>
            <th scope="row">3</th>
            <td>Aqua</td>
            <td>100</td>
            <td>5000</td>
            <td>
              <button type="button" class="btn btn-danger">Hapus</button>
              <button type="button" class="btn btn-warning">Edit</button>
            </td>
          </tr>

          <!-- Baris data ke-4 -->
          <tr>
            <th scope="row">4</th>
            <td>Aqua</td>
            <td>100</td>
            <td>5000</td>
            <td>
              <button type="button" class="btn btn-danger">Hapus</button>
              <button type="button" class="btn btn-warning">Edit</button>
            </td>
          </tr>
        </tbody>
      </table>

    </div>
  </div>
@endsection
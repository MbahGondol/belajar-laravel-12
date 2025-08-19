@extends('layouts.master') 
<!-- Menggunakan layout utama 'master.blade.php' sebagai kerangka halaman -->

@section('konten') 
<!-- Mengisi section 'konten' yang sudah disediakan di layout master -->

<div class="card"> <!-- Membuat card Bootstrap sebagai container utama -->
  <div class="card-header">Edit Data Produk</div> <!-- Header card -->
  <div class="card-body"> <!-- Isi card -->

    <!-- Form untuk menambahkan data produk -->
    <form action="/product/{{ $data->id_produk }}" method="POST"> 
      @method('PUT')
      @csrf <!-- Token CSRF untuk keamanan form -->

      <div class="row"> <!-- Membuat grid row Bootstrap -->

        <!-- Input Nama Produk -->
        <div class="col-sm-6"> <!-- Kolom setengah lebar -->
          <div class="mb-3"> <!-- Margin bawah -->
            <label class="form-label">Nama Produk</label> <!-- Label input -->
            <input type="text" name="nama_produk" class="form-control" value="{{ $data->nama_produk }}" > <!-- Input teks nama produk, value diisi ulang jika validasi gagal -->
            @error('nama_produk') <!-- Menampilkan pesan error jika validasi gagal -->
            <div id="emailHelp" class="form-text text-danger">{{$message}}</div> <!-- Pesan error berwarna merah -->
            @enderror
          </div>
        </div>

        <!-- Input Harga Produk -->
        <div class="col-sm-6"> <!-- Kolom setengah lebar -->
          <div class="mb-3"> <!-- Margin bawah -->
            <label class="form-label">Harga Produk</label> <!-- Label input -->
            <input type="number" name="harga_produk" class="form-control" value="{{ $data->harga }}" > <!-- Input angka harga produk -->
            @error('harga_produk') <!-- Menampilkan pesan error validasi -->
            <div id="emailHelp" class="form-text text-danger">{{$message}}</div> <!-- Pesan error berwarna merah -->
            @enderror
          </div>
        </div>

        <!-- Input Deskripsi Produk -->
        <div class="col-12"> <!-- Kolom penuh -->
          <div class="form-floating"> <!-- Menggunakan form-floating Bootstrap -->
            <textarea class="form-control" name="deskripsi" placeholder="Leave a comment here" style="height: 100px">{{ $data->deskripsi_produk }}</textarea> <!-- Textarea untuk deskripsi produk -->
            <label>Deskripsi Produk</label> <!-- Label floating -->
          </div>
          @error('deskripsi') <!-- Menampilkan pesan error validasi -->
          <div id="emailHelp" class="form-text text-danger">{{$message}}</div> <!-- Pesan error berwarna merah -->
          @enderror
        </div>

        <!-- Tombol Submit -->
        <div class="col-sm-12 mt-3"> <!-- Kolom penuh dengan margin atas -->
          <button type="submit" class="btn btn-primary">Tambah Data</button> <!-- Tombol kirim form -->
        </div>

      </div> <!-- End row -->
    </form> <!-- End form -->

  </div> <!-- End card-body -->  
</div> <!-- End card -->

@endsection 
<!-- Menutup section 'konten' -->
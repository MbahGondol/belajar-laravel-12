<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Laravel 12</title>
  </head>
  <body>

    <!-- Menyertakan file Blade partial 'navbar' dari folder layouts -->
    @include('layouts.navbar')
    
    {{-- Komentar Blade: menandai bagian konten utama --}}
    {{-- konten --}}

    <!-- Membungkus konten utama dengan container Bootstrap dan memberi jarak atas (mt-3) -->
    <div class="container mt-3">
        {{-- Blade directive @yield untuk menampilkan isi konten 
             dari section 'konten' yang didefinisikan di file view lain --}}
        @yield('konten')
    </div>

    <!-- Menyertakan file Blade partial 'footer' dari folder layouts -->
    @include('layouts.footer')

    <!-- Memuat file JavaScript Bootstrap (bundle) dari CDN
         agar fitur interaktif seperti navbar collapse, modal, carousel, dll. dapat berfungsi -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" 
            crossorigin="anonymous"></script>
</body>
</html>
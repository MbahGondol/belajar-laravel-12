{{-- navbar --}}
<!-- Membuat elemen navbar Bootstrap dengan tema gelap (navbar-dark) dan warna latar merah (bg-danger) -->
<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
  
  <!-- Membuat container agar isi navbar rata dan rapi -->
  <div class="container">

    <!-- Brand/logo yang mengarah ke halaman utama "/" -->
    <a class="navbar-brand" href="/">Master Of Laravel-12</a>

    <!-- Tombol hamburger (toggle) untuk tampilan mobile -->
    <button class="navbar-toggler" type="button" 
            data-bs-toggle="collapse"          <!-- Perintah untuk membuka/menutup menu -->
            data-bs-target="#navbarNav"        <!-- Target elemen menu yang akan di-toggle -->
            aria-controls="navbarNav"          <!-- Menyatakan elemen yang dikontrol tombol -->
            aria-expanded="false"              <!-- Status awal menu tertutup -->
            aria-label="Toggle navigation">    <!-- Label untuk pembaca layar -->
      <span class="navbar-toggler-icon"></span> <!-- Ikon hamburger -->
    </button>

    <!-- Menu navigasi yang bisa collapse di layar kecil -->
    <div class="collapse navbar-collapse" id="navbarNav">
      
      <!-- List menu navigasi -->
      <ul class="navbar-nav ms-auto"> <!-- ms-auto untuk memposisikan menu di sisi kanan -->
        
        <!-- Item menu Beranda -->
        <li class="nav-item">
          <a class="nav-link" href="/">Beranda</a>
        </li>

        <!-- Item menu About -->
        <li class="nav-item">
          <a class="nav-link" href="/about">About</a>
        </li>

        <!-- Item menu Kontak -->
        <li class="nav-item">
          <a class="nav-link" href="/contact">Kontak</a>
        </li>

        <!-- Item menu Produk -->
        <li class="nav-item">
          <a class="nav-link" href="/product">Produk</a>
        </li>

      </ul>
    </div>
  </div>
</nav>
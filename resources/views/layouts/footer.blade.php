<style>
    body {
        min-height: 100vh;       /* Biar body selalu minimal setinggi layar */
        display: flex;
        flex-direction: column;  /* Atur tata letak jadi vertikal */
        margin: 0;               /* Hilangkan margin bawaan */
    }

    main {
        flex: 1;                 /* Bagian utama konten mengisi ruang kosong */
    }

    .footer {
        height: 50px;            
        width: 100%;
        background-color: #303030;
        color: white;
        text-align: center;
        line-height: 50px;
    }
</style>

<!-- Struktur konten utama -->
<main>
    {{-- Konten halamanmu taruh di sini --}}
    @yield('content')
</main>

<!-- Footer -->
<div class="footer">
    <span>Copyright MbahGondol Master Of Laravel-12</span>
</div>
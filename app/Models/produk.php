<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    // inisialisasi tabel produk
    protected $table = 'tb_produk';

    // inisialisasi primary key di dalam table
    protected $primaryKey = 'id_produk';

    // inisialisasi data yang bisa kita isi
    //protected $fillable = ['nama_produk', 'harga', 'stok'];
    // inisialisasi data yang tak boleh kita isi
    protected $guarded = ['id_produk'];
}

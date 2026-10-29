<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Produk extends Model
{
    protected $table = 'produk';

    protected $fillable = [
        'nama_produk',
        'kategori',
        'kategori_id',
        'deskripsi',
        'harga',
        'stok',
        'gambar',
    ];

    public function kategoriRelasi(): BelongsTo
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
}

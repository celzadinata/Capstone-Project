<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail_transaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaksis_id',
        'produks_id',
        'nama_produk',
        'harga',
        'qty',
        'sub_total'
    ];

    public function transaksi()
    {
        return $this->belongsTo(transaksi::class);
    }

    public function produk()
    {
        return $this->belongsTo(produk::class,'produks_id');
    }
}

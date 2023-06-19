<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class produk extends Model
{
    use HasFactory, SoftDeletes;
    // use SoftDeletes;
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'users_id',
        'kategoris_id',
        'jenis',
        'nama_produk',
        'deskripsi',
        'foto',
        'harga',
        'stok',
        'berkas_1',
        'berkas_2',
        'berkas_3',
        'tampilkan',
        'status',
        'rate'
    ];

    protected $keyType = 'string';
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $jenis = $model->jenis;

            if ($jenis == 'paket_usaha') {
                $prefix = 'PU';
            } elseif ($jenis == 'supply') {
                $prefix = 'SP';
            } else {
                $prefix = '';
            }

            $products = produk::withTrashed() // Mengambil semua produk termasuk yang dihapus secara lunak
                ->where('jenis', $jenis)
                ->orderBy('id', 'asc')
                ->get();

            $usedIds = [];

            foreach ($products as $product) {
                $productId = substr($product->id, -4);
                $usedIds[] = intval($productId);
            }

            for ($i = 1; $i <= 9999; $i++) {
                if (!in_array($i, $usedIds)) {
                    $count = $i;
                    break;
                }
            }

            if (!isset($count)) {
                $lastProduct = $products->last();
                if ($lastProduct) {
                    $lastProductId = substr($lastProduct->id, -4);
                    $count = intval($lastProductId) + 1;
                } else {
                    $count = 1;
                }
            }

            $model->id = $prefix . str_pad($count, 4, '0', STR_PAD_LEFT);
            $model->slug = Str::slug($model->nama_produk); // Generate slug from nama_produk
        });
    }

    public function kategori()
    {
        return $this->belongsTo(kategori::class, 'kategoris_id');
    }
    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function detail_transaksi()
    {
        return $this->hasMany(detail_transaksi::class, 'produks_id');
    }

    public function review()
    {
        return $this->hasMany(review::class, 'produks_id');
    }

    public function notif()
    {
        return $this->hasMany(notifikasi::class, 'produks_id');
    }
}

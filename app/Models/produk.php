<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class produk extends Model
{
    use HasFactory;
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

            $count = produk::where('jenis', $jenis)->count();
            $model->id = $prefix . str_pad($count + 1, 4, '0', STR_PAD_LEFT);
        });
    }
    public function kategori()
    {
        return $this->belongsTo(kategori::class);
    }
    public function users()
    {
        return $this->belongsTo(User::class);
    }
    public function detail_transaksi()
    {
        return $this->hasMany(detail_transaksi::class);
    }

    public function reviews()
    {
        return $this->hasMany(review::class,'produks_id');
    }

    public function notif()
    {
        return $this->hasMany(notifikasi::class,'produks_id');
    }
}

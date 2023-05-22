<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'status',
        'rate'
    ];

    public function categories()
    {
        return $this->belongsTo(categories::class);
    }

    public function users()
    {
        return $this->belongsTo(users::class);
    }

    public function detail_transactions()
    {
        return $this->hasMany(detail_transactions::class);
    }
}

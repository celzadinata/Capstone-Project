<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class notifikasi extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'produks_id',
        'users_id',
        'judul',
        'pesan',
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }
    public function produks()
    {
        return $this->belongsTo(produk::class);
    }
}

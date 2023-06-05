<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class review extends Model
{
    use HasFactory;
    protected $fillable =[
        'id',
        'users_id',
        'produk_id',
        'rate',
        'review',
        'reply'
    ];

    protected $keyType = 'users_id';
    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function produks()
    {
        return $this->belongsTo(produk::class);
    }
}

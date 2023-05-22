<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class review extends Model
{
    use HasFactory;

    public function User()
    {
        return $this->belongsTo(User::class, 'id');
    }

    public function produk()
    {
        return $this->belongsTo(produk::class, 'id');
    }
}

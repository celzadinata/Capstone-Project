<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use HasFactory;

    public function detail_transaksi()
    {
        return $this->hasMany(detail_transaksi::class);
    }
    public function users()
    {
        return $this->belongsTo(User::class);
    }

    protected $keyType = 'string';
}

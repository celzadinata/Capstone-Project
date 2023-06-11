<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'user_id',
        'tanggal',
        'total',
        'bukti_pembayaran'
    ];

    public function detail_transaksi()
    {
        return $this->hasMany(detail_transaksi::class, 'transaksis_id');
    }
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}

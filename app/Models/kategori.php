<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'slug'
    ];
    public function produk()
    {
        return $this->hasMany(produk::class,'kategoris_id');
    }
}

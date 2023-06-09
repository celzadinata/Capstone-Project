<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'nama_depan',
        'email',
        'password',
        'role',
        'username',
        'jenis_kelamin',
        'alamat',
        'status',
        'no_hp',
        'paypal_email',
        'no_rek',
        'latitude',
        'longitude',
    ];

    protected $keyType = 'string';

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function produk()
    {
        return $this->hasMany(produk::class, 'users_id')->withTrashed();
    }
    public function notif()
    {
        return $this->hasMany(notifikasi::class);
    }
    public function transaksi()
    {
        return $this->hasMany(transaksi::class);
    }
    public function reviews()
    {
        return $this->hasMany(Review::class, 'users_id');
    }
    public function detail_transaksi()
    {
        return $this->hasMany(detail_transaksi::class, 'users_id');
    }
}

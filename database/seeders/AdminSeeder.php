<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            // Admin
            [
                'id'    =>  'ADMIN',
                'role' => 'admin',
                'avatar' => 'default',
                'nama_depan' => 'YokResell',
                'nama_belakang' => '',
                'username' => 'YokResellAdm',
                'email' => 'yokresell@gmail.com',
                'jenis_kelamin' => 'laki-laki',
                'password' => bcrypt('yokresell'),
                'alamat' => 'Dimana saja',
                'no_hp' => '082876123',
                'status' => 'Aktif',
            ],
            // Pengusaha
            [
                'id' => 'a8ek9665',
                'role' => 'pengusaha',
                'avatar' => 'default',
                'nama_depan' => 'Raihan',
                'nama_belakang' => '',
                'username' => 'Han12',
                'email' => 'akh.raihanaf@gmail.com',
                'jenis_kelamin' => 'laki-laki',
                'password' => bcrypt('qwer4321'),
                'alamat' => 'Jl dimana mana',
                'no_hp' => '082234086611',
                'status' => 'Aktif'
            ],
            // Reseller
            [
                'id' => 'K4uS7368',
                'role' => 'reseller',
                'avatar' => 'default',
                'nama_depan' => 'mas brody',
                'nama_belakang' => 'MM',
                'username' => 'masbrod',
                'email' => 'masbrod@gmail.com',
                'jenis_kelamin' => 'laki-laki',
                'password' => bcrypt('qazaq123'),
                'alamat' => 'Jl everywhere',
                'no_hp' => '089123456789',
                'status' => 'Aktif'
            ]
        ];

        User::insert($user);
    }
}

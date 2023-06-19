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
                'id'            => 'ADMIN',
                'role'          => 'admin',
                'avatar'        => null,
                'nama_depan'    => 'YokResell',
                'nama_belakang' => null,
                'username'      => 'Yok Resell Admin',
                'email'         => 'yokresell@gmail.com',
                'jenis_kelamin' => 'laki-laki',
                'password' => bcrypt('yokresell'),
                'alamat' => 'Dimana saja',
                'no_hp' => '082876123',
                'paypal_email' => null,
                'status' => 'Aktif',
                'latitude' => '-7.0281093',
                'longitude' => '112.7410192',

            ],
            // Pengusaha
            [
                'id'            => 'a8ek9665',
                'role'          => 'pengusaha',
                'avatar'        => null,
                'nama_depan'    => 'Raihan',
                'nama_belakang' => null,
                'username'      => 'Han12',
                'email'         => 'akh.raihanaf@gmail.com',
                'jenis_kelamin' => 'laki-laki',
                'password' => bcrypt('qwer4321'),
                'alamat' => 'Jl dimana mana',
                'no_hp' => '082234086611',
                'paypal_email' => 'raihan@gmail.com', //passwordnya qweasdzxc
                'status' => 'Aktif',
                'latitude' => '-7.0281093',
                'longitude' => '112.7410192'
            ],
            [
                'id'            => '923ewKLM',
                'role'          => 'pengusaha',
                'avatar'        => null,
                'nama_depan'    => 'Mail',
                'nama_belakang' => null,
                'username'      => 'Mail2singgit',
                'email'         => 'hahaharizal6@gmail.com',
                'jenis_kelamin' => 'laki-laki',
                'password'      => bcrypt('qwer4321'),
                'alamat'        => 'Jl durian runtuh no 21',
                'no_hp'         => '082213429867',
                'paypal_email' =>  'mail@gmail.com',
                'status'        => 'Aktif',
                'latitude' => '-7.0281093',
                'longitude' => '112.7410192'
            ],
            [
                'id'            => 'ABC06060',
                'role'          => 'pengusaha',
                'avatar'        => null,
                'nama_depan'    => 'Bang Saleh',
                'nama_belakang' => 'amboyyy',
                'username'      => 'SalehAmboyy',
                'email'         => 'saleh@gmail.com',
                'jenis_kelamin' => 'Perempuan',
                'password'      => bcrypt('qwer4321'),
                'alamat'        => 'Jl durian bangkit no 66',
                'no_hp'         => '089213247689',
                'paypal_email' =>  'saleh@gmail.com',
                'status'        => 'Aktif',
                'latitude' => '-7.0281093',
                'longitude' => '112.7410192'
            ],
            [
                'id'            => 'NFLT0066',
                'role'          => 'pengusaha',
                'avatar'        => null,
                'nama_depan'    => 'Naufal',
                'nama_belakang' => 'TQ',
                'username'      => 'naufal66',
                'email'         => 'naufaltaufiq66@gmail.com',
                'jenis_kelamin' => 'laki-laki',
                'password' => bcrypt('12345678'),
                'alamat' => 'PWT',
                'no_hp' => '089512345678',
                'paypal_email' => 'naufal@gmail.com', //passwordnya qweasdzxc
                'status' => 'Aktif',
                'latitude' => '-7.0281093',
                'longitude' => '112.7410192'

            ],
            // Reseller
            [
                'id'            => 'K4uS7368',
                'role'          => 'reseller',
                'avatar'        => null,
                'nama_depan'    => 'mas brody',
                'nama_belakang' => 'MM',
                'username'      => 'masbrod',
                'email'         => 'masbrod@gmail.com',
                'jenis_kelamin' => 'laki-laki',
                'password'      => bcrypt('qazaq123'),
                'alamat'        => 'Jl Land of Dawn goldlane',
                'no_hp'         => '089123456789',
                'paypal_email' =>  null,
                'status'        => 'Aktif',
                'latitude' => '-7.0281093',
                'longitude' => '112.7410192'
            ],
            [
                'id'            => '68oiQA40',
                'role'          => 'reseller',
                'avatar'        => null,
                'nama_depan'    => 'Upin',
                'nama_belakang' => null,
                'username'      => 'Upinbelomgede',
                'email'         => 'upin@gmail.com',
                'jenis_kelamin' => 'laki-laki',
                'password' => bcrypt('qazaq123'),
                'alamat' => 'Jl everywhere',
                'no_hp' => '089123456789',
                'paypal_email' => null,
                'status' => 'Aktif',
                'latitude' => '-7.0281093',
                'longitude' => '112.7410192'
            ],
            [
                'id'            => 'K4uS7360',
                'role'          => 'reseller',
                'avatar'        => null,
                'nama_depan'    => 'mas brot',
                'nama_belakang' => 'MM',
                'username'      => 'masbrot',
                'email'         => 'test@gmail.com',
                'jenis_kelamin' => 'laki-laki',
                'password' => bcrypt('qweasdzxc'),
                'alamat' => 'Jl everywhere',
                'no_hp' => '089123456712',
                'paypal_email' => null,
                'status' => 'Aktif',
                'latitude' => '-7.0281093',
                'longitude' => '112.7410192'
            ],
        ];

        User::insert($user);
    }
}

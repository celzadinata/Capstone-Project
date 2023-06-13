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
                'avatar'        => '',
                'nama_depan'    => 'YokResell',
                'nama_belakang' => '',
                'username'      => 'Yok Resell Admin',
                'email'         => 'yokresell@gmail.com',
                'jenis_kelamin' => 'laki-laki',
                'password'      => bcrypt('yokresell'),
                'alamat'        => 'Dimana saja',
                'no_hp'         => '082876123',
                'status'        => 'Aktif',
            ],
            // Pengusaha
            [
                'id'            => 'a8ek9665',
                'role'          => 'pengusaha',
                'avatar'        => '',
                'nama_depan'    => 'Raihan',
                'nama_belakang' => '',
                'username'      => 'Han12',
                'email'         => 'akh.raihanaf@gmail.com',
                'jenis_kelamin' => 'laki-laki',
                'password'      => bcrypt('qwer4321'),
                'alamat'        => 'Jl dimana mana',
                'no_hp'         => '082234086611',
                'status'        => 'Aktif'
            ],
            [
                'id'            => '923ewKLM',
                'role'          => 'pengusaha',
                'avatar'        => '',
                'nama_depan'    => 'Mail',
                'nama_belakang' => '',
                'username'      => 'Mail2singgit',
                'email'         => 'mailmail01@gmail.com',
                'jenis_kelamin' => 'laki-laki',
                'password'      => bcrypt('qwer4321'),
                'alamat'        => 'Jl durian runtuh no 21',
                'no_hp'         => '082213429867',
                'status'        => 'Aktif'
            ],
            [
                'id'            => 'ABC06060',
                'role'          => 'pengusaha',
                'avatar'        => '',
                'nama_depan'    => 'Bang Saleh',
                'nama_belakang' => 'amboyyy',
                'username'      => 'SalehAmboyy',
                'email'         => 'tehtarik3@gmail.com',
                'jenis_kelamin' => 'Perempuan',
                'password'      => bcrypt('qwer4321'),
                'alamat'        => 'Jl durian bangkit no 66',
                'no_hp'         => '089213247689',
                'status'        => 'Aktif'
            ],
            [
                'id'            => 'NFLT0066',
                'role'          => 'pengusaha',
                'avatar'        => '',
                'nama_depan'    => 'Naufal',
                'nama_belakang' => 'TQ',
                'username'      => 'naufal66',
                'email'         => 'naufal66@gmail.com',
                'jenis_kelamin' => 'laki-laki',
                'password'      => bcrypt('12345678'),
                'alamat'        => 'PWT',
                'no_hp'         => '089512345678',
                'status'        => 'Aktif',
            ],
            // Reseller
            [
                'id'            => 'K4uS7368',
                'role'          => 'reseller',
                'avatar'        => '',
                'nama_depan'    => 'mas brody',
                'nama_belakang' => 'MM',
                'username'      => 'masbrod',
                'email'         => 'masbrod@gmail.com',
                'jenis_kelamin' => 'laki-laki',
                'password'      => bcrypt('qazaq123'),
                'alamat'        => 'Jl Land of Dawn goldlane',
                'no_hp'         => '089123456789',
                'status'        => 'Aktif'
            ],
            [
                'id'            => '68oiQA40',
                'role'          => 'reseller',
                'avatar'        => '',
                'nama_depan'    => 'Upin',
                'nama_belakang' => '',
                'username'      => 'Upinbelomgede',
                'email'         => 'upin@gmail.com',
                'jenis_kelamin' => 'laki-laki',
                'password'      => bcrypt('qazaq123'),
                'alamat'        => 'Jl Markopolo no 88',
                'no_hp'         => '089123456532',
                'status'        => 'Aktif'
            ],
            [
                'id'            => 'K4uS7360',
                'role'          => 'reseller',
                'avatar'        => '',
                'nama_depan'    => 'mas brot',
                'nama_belakang' => 'MM',
                'username'      => 'masbrot',
                'email'         => 'test@gmail.com',
                'jenis_kelamin' => 'laki-laki',
                'password'      => bcrypt('qweasdzxc'),
                'alamat'        => 'Jl everywhere',
                'no_hp'         => '089123456712',
                'status'        => 'Aktif'
            ],
        ];

        User::insert($user);
    }
}

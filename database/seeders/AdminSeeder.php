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
            [
                'id'    =>  '1',
                'role' => 'admin',
                'avatar' => 'default',
                'nama_depan' => 'Rizal',
                'nama_belakang' => 'Jago',
                'username' => 'rizaleka',
                'email' => 'rizal@gmail.com',
                'jenis_kelamin' => 'laki-laki',
                'password' => bcrypt('rizal'),
                'alamat' => 'Banyuwangi',
                'no_hp' => '082876123',
                'status' => 'Aktif',
            ],
        ];

        User::insert($user);
    }
}

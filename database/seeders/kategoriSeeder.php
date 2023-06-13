<?php

namespace Database\Seeders;

use App\Models\kategori;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class kategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kategori = [
            [
                'id'    =>  '1',
                'nama' => 'Makanan',
            ],
            [
                'id'    =>  '2',
                'nama' => 'Minuman',
            ],
            [
                'id'    =>  '3',
                'nama' => 'Dapur',
            ],
            [
                'id'    =>  '4',
                'nama' => 'Elektronik',
            ],
            [
                'id'    =>  '5',
                'nama' => 'Jasa',
            ],
            [
                'id'    =>  '6',
                'nama' => 'Lain-Lain',
            ],

        ];

        kategori::insert($kategori);
    }
}

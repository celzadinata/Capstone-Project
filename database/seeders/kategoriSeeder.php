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
                'slug' => 'makanan'
            ],
            [
                'id'    =>  '2',
                'nama' => 'Minuman',
                'slug' => 'minuman',
            ],
            [
                'id'    =>  '3',
                'nama' => 'Dapur',
                'slug' => 'dapur',
            ],
            [
                'id'    =>  '4',
                'nama' => 'Elektronik',
                'slug' => 'elektronik',
            ],
            [
                'id'    =>  '5',
                'nama' => 'Jasa',
                'slug' => 'jasa',
            ],
            [
                'id'    =>  '6',
                'nama' => 'Lain-Lain',
                'slug' => 'lain-lain',
            ],

        ];

        kategori::insert($kategori);
    }
}

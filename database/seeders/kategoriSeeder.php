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

        ];

        kategori::insert($kategori);
    }
}

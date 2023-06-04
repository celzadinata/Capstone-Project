<?php

namespace Database\Seeders;

use App\Models\produk;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class produkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $produk = [
            // paket usaha
            [
                'id'=>'AYM001',
                'users_id'=>'a8ek9665',
                'kategoris_id'=>'1',
                'jenis' => 'paket_usaha',
                'nama_produk' => 'Makanan franchise Ayam',
                'deskripsi' => 'Ayam yang membuat harimu menyenangkan. Dengan bumbu racikan khusus dari usaha kami yang dapat membuat konsumen ketagihan dengan ayam ini',
                'foto' => 'ayam.png',
                'harga' => '12500000',
                'stok' => '10',
                'berkas_1' => 'file.pdf',
                'berkas_2' => 'file2.pdf',
                'berkas_3' => 'file3.pdf',
                'status' => '1',
                'tampilkan' => '1'
            ],
            // supply
            [
                'id'=>'AYM002',
                'users_id'=>'a8ek9665',
                'kategoris_id'=>'1',
                'jenis' => 'supply',
                'nama_produk' => 'Ayam fillet 200gr',
                'deskripsi' => 'Ayam yang menemani kekosongan harimu',
                'foto' => 'ayamfillet.png',
                'harga' => '240000',
                'stok' => '15',
                'berkas_1' => '',
                'berkas_2' => '',
                'berkas_3' => '',
                'status' => '1',
                'tampilkan' => '1'
            ],
        ];
        produk::insert($produk);
        
    }
}

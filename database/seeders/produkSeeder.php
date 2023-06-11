<?php

namespace Database\Seeders;

use App\Models\produk;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

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
                'id' => 'AYM001',
                'users_id' => 'a8ek9665',
                'kategoris_id' => '1',
                'jenis' => 'paket_usaha',
                'nama_produk' => 'Makanan franchise Ayam',
                'deskripsi' => 'Ayam yang membuat harimu menyenangkan. Dengan bumbu racikan khusus dari usaha kami yang dapat membuat konsumen ketagihan dengan ayam ini',
                'foto' => 'ayam.png',
                'harga' => '12500000',
                'stok' => '10',
                'berkas_1' => 'sad.pdf',
                'berkas_2' => 'apaan.pdf',
                'berkas_3' => '',
                'status' => 'Belum Konfirmasi',
                'tampilkan' => '0',
                'slug' => Str::slug('Makanan franchise Ayam')
            ],
            // supply
            [
                'id' => 'AYM002',
                'users_id' => 'a8ek9665',
                'kategoris_id' => '1',
                'jenis' => 'supply',
                'nama_produk' => 'Ayam fillet 200gr',
                'deskripsi' => 'Ayam yang menemani kekosongan harimu',
                'foto' => 'ayamfillet.png',
                'harga' => '240000',
                'stok' => '15',
                'berkas_1' => '',
                'berkas_2' => '',
                'berkas_3' => '',
                'status' => '0',
                'tampilkan' => '0',
                'slug' => Str::slug('Ayam fillet 200gr')
            ],
        ];

        foreach ($produk as $item) {
            $item['slug'] = Str::slug($item['nama_produk']);
            Produk::create($item);
        }
    }
}

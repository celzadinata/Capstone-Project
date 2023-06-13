<?php

namespace Database\Seeders;

use App\Models\transaksi;
use App\Models\detail_transaksi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class transaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $transaksi = [
            //transaksi
            [
                'id' => 'TRX0111111',
                'user_id' => 'K4uS7368',
                'tanggal' => '2023-06-01 07:44:04',
                'total' =>  '12740000',
                'status' => 'Menunggu Pembayaran',
                'bukti_pembayaran' => 'sad.pdf'
            ],
            [
                'id' =>  'TRX0111112',
                'user_id' => 'K4uS7368',
                'tanggal' => '2023-07-01 07:44:04',
                'total' => '240000',
                'status' => 'Menunggu Pembayaran',
                'bukti_pembayaran' => 'asd.pdf'
            ]
        ];

        transaksi::insert($transaksi);

        $detail_transaksi = [
            // TRX0111111
            [
                'id' => '1',
                'transaksis_id' => 'TRX0111111',
                'produks_id' => 'PU0001',
                'users_id' => 'K4uS7368',
                'nama_produk' => 'Makanan franchise Ayam',
                'harga' => '12500000',
                'qty' => '1',
                'sub_total' => '12500000'
            ],
            [
                'id' => '2',
                'transaksis_id' => 'TRX0111111',
                'produks_id' => 'SP0001',
                'users_id' => 'K4uS7368',
                'nama_produk' => 'Ayam fillet 200gr',
                'harga' => '240000',
                'qty' => '1',
                'sub_total' => '240000'
            ],
            // TRX0111112
            [
                'id' => '3',
                'transaksis_id' => 'TRX0111112',
                'produks_id' => 'SP0001',
                'users_id' => 'K4uS7360',
                'nama_produk' => 'Ayam fillet 200gr',
                'harga' => '240000',
                'qty' => '1',
                'sub_total' => '240000'
            ],


        ];
        detail_transaksi::insert($detail_transaksi);
    }
}

<?php

namespace Database\Seeders;

use App\Models\review;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class reviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $review = [
            [
                'id'    =>  '1',
                'users_id' => 'a8ek9665',
                'produk_id' => 'AYM002',
                'rate'=> '4',
                'review'=> 'Mantap saya mau beli lagi',
                'reply' => ''
            ],
        ];

        review::insert($review);
    }
}

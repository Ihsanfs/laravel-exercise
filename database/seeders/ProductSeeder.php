<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [];

        for ($i = 1; $i <= 10; $i++) {
            $products[] = [
                'id' => $i,
                'name' => 'Product ' . $i,
                'price' => rand(100, 1000) / 10, // Menentukan harga secara acak antara 10 hingga 100
            ];
        }

        DB::table('produk')->insert($products);

    }
}

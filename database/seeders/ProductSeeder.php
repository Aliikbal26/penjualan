<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        //
        Product::create([
            'name_product' => 'Headshet Realmi',
            'description' => 'Deskripsi produk Headset Realmi',
            'kode_product' => 'ACC-001',
            'purchase_price' => 10000,
            'selling_price' => 20000,
            'stock' => 10
        ]);

        Product::create([
            'name_product' => 'Kuota Axis 2.5 GB ',
            'description' => 'Masa Aktif 5 Hari',
            'kode_product' => 'VOC-001',
            'purchase_price' => 10000,
            'selling_price' => 13000,
            'stock' => 20
        ]);
    }
}

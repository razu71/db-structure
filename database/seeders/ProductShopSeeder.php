<?php

namespace Database\Seeders;

use App\Models\Shop;
use Illuminate\Database\Seeder;

class ProductShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Shop::all()->each(function ($shop)  {
            $shop->products()->attach([
                'products_amount' => mt_rand(1, 100),
                'price' => mt_rand(1, 100),
            ]);
        });
    }
}

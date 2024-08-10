<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\Post;
use App\Models\User;
use App\Models\Photo;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Banner;
use App\Enums\CommonEnum;
use App\Models\Product;
use App\Models\ProductInventory;
use App\Models\Shop;
use App\Models\Warehouse;
use App\Models\WarehouseLocation;
use Database\Factories\ProductShopFactory;
use Illuminate\Database\Seeder;
use Database\Seeders\AdminSettingSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(CommonEnum::NO_OF_RECORDS)->create();
        Post::factory(CommonEnum::NO_OF_RECORDS)->create();
        Tag::factory(CommonEnum::NO_OF_RECORDS)->create();
        Banner::factory(CommonEnum::NO_OF_RECORDS)->create();
        Shop::factory(100)->create();
        Product::factory(100)->create();
        Photo::factory(CommonEnum::PHOTO_RECORDS)->create();

        WarehouseLocation::factory(10)->create();
        Warehouse::factory(10)->create();
        ProductInventory::factory(10)->create();

        $this->call([
            AdminSettingSeeder::class,
            ProductShopSeeder::class,
        ]);
    }
}

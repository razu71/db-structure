<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        //get products with inventories
        $product = Product::query()
            ->with('inventories')
            ->first();

        $product->inventories->each(function ($inventory) use($product) {
            dump($product, $inventory->warehouseLocation);
        });


    }
}

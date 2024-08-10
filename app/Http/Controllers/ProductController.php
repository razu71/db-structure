<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Benchmark;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        // $product = Product::query()
        //     ->with('inventories')
        //     ->first();

        // $product->inventories->each(function ($inventory) use($product) {
        //     dump($product, $inventory->warehouseLocation);
        // });

        //benchmark of queries
        // Benchmark::dd([
        //     fn() => Product::query()->where('id', 1)->first(),
        //     fn() => Product::where('id', 1)->first(),
        //     fn() => Shop::with('products')->get(),
        // ], 10);

        return view('products', compact('products'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search') ?? '';
        $products = Product::query()
            ->whereLike('name', '%'. $search .'%', caseSensitive: false)
            ->get();

        return view('products', compact('products'));
    }

    public function find(Product $product)
    {
        dd($product);
    }

    public function updatePivot()
    {
        $shop = Shop::first();

        $shop->products()->each(function ($product) {
            $product->pivot->update([
                'products_amount' => 10
            ]);
        });

        // $shop->products()->updateExistingPivot(2, [
        //     'products_amount' => 5
        // ]);

        dd($shop->load('products'));
    }
}

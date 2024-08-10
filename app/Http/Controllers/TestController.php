<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Benchmark;

class TestController extends Controller
{
    public function testBench()
    {
        Benchmark::dd([
            //EAV (Entity Attribute Value) approach
            //slowest
            fn() => Product::whereHas('properties', function ($query) {
                $query->where('properties.name', 'size')
                    ->where('product_property.value', 'L');
            })->whereHas('properties', function ($query) {
                $query->where('properties.name', 'color')
                    ->where('product_property.value', 'red');
            })
                ->get(),

                //slow
            fn() => Product::query()
                ->where('properties->size', 'L')
                ->where('properties->color', 'red')
                ->get(),

                //fast, might be looks not good but fast
            fn() => Product::query()
                ->where('size', 'L')
                ->where('color', 'red')
                ->get(),
        ], 5);
    }
}

<?php

use App\Models\Shop;
use App\Models\Article;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ProductController;

Route::get('/', [HomeController::class, 'home']);

Route::get('/products', [ShopController::class, 'index']);
Route::get('product/{product}', [ShopController::class, 'find']);
Route::get('/product-update', [ShopController::class, 'updatePivot']);

Route::get('/inventory', [ProductController::class, 'index']);


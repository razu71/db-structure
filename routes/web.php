<?php

use App\Models\Shop;
use App\Models\Article;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ProductController;

Route::get('/', [HomeController::class, 'home']);

Route::get('/products', [ProductController::class, 'index']);
Route::get('product/{product}', [ProductController::class, 'find']);
Route::get('/product-update', [ProductController::class, 'updatePivot']);

Route::get('/inventory', [ProductController::class, 'index']);


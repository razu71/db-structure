<?php

use App\Http\Controllers\CategoryController;
use App\Models\Shop;
use App\Models\Article;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;

Route::get('/', [HomeController::class, 'home']);

//user routes
Route::get('/users', [UserController::class, 'index']);
Route::get('/status', [UserController::class, 'status']);

//category routes
Route::get('/categories', [CategoryController::class, 'index']);

//product routes
Route::get('/products', [ProductController::class, 'index']);
Route::get('product/{product}', [ProductController::class, 'find']);
Route::get('/product-update', [ProductController::class, 'updatePivot']);

//inventory routes
Route::get('/inventory', [ProductController::class, 'index']);


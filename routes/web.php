<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Product;
Route::get('/', [product::class, 'allProduct']);
Route::get('/product/{id}', [product::class, 'productID']);
Route::get('/product/categories/{categories}', [product::class, 'categories']);





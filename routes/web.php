<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductFilterController;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/products',[ProductFilterController::class,'index'])->name('products.index');
Route::match(['get', 'post'], '/products/filter', [ProductFilterController::class, 'filter'])->name('products.filter');

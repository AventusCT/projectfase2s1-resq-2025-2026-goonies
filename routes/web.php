<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Http\Controllers\ProductController;

// Producten overzicht met filter via controller
Route::get('/producten', [ProductController::class, 'index'])->name('producten.index');

// Homepagina
Route::get('/', function () {
    return view('home');
});

// Product detailpagina via closure
Route::get('/producten/{id}', function ($id) {
    $product = Product::find($id);

    return view('product', ['product' => $product]);
});

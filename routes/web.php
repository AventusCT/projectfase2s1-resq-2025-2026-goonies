<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LoginController;

Route::get('/inlog', function () {
    return view('inlog');
})->name('inlog');

Route::post('/login', [LoginController::class, 'authenticate'])->name('login');

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

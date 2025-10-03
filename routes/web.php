<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;


Route::get('/', function () {
    return view('home');
});

Route::get('/producten', function () {
    return view('producten', [
        'producten' => Product::all()
    ]);
});


Route::get('/producten/{id}', function ($id) {
    $product = Product::find($id);

    return view('product', ['product' => $product]);
});

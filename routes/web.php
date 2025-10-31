<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Auth;

Route::get('/inlog', function () {
    return view('inlog');
})->name('inlog');

Route::get('/inlog', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/inlog', [LoginController::class, 'login']);

// Producten overzicht met filter via controller
Route::get('/producten', [ProductController::class, 'index'])->name('producten.index');

// Homepagina
Route::get('/', function () {
    return view('home');
});

// Product detailpagina via closure
// Producten overzicht met filter via controller
Route::get('/producten', [ProductController::class, 'index'])
    ->middleware('auth')
    ->name('producten.index');

// Product detailpagina via closure
Route::get('/producten/{id}', function ($id) {
    $product = Product::find($id);
    return view('product', ['product' => $product]);
})->middleware('auth');


Route::get('/register', [RegisterController::class, 'show'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/'); // Of pas aan naar je gewenste pagina
})->name('logout');

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::get('/products', [ProductController::class, 'index']);
Route::post('/products', [ProductController::class, 'importProducts'])->name('products.import');
Route::get('/exportProducts', [ProductController::class, 'exportProducts'])->name('exportProducts');


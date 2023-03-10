<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::name('product.')->group(function () {
    Route::get('/products', [ProductController::class, 'index'])->name('list');
    Route::get('/products/{id}', [ProductController::class, 'show'])->name('show');
    Route::post('/products', [ProductController::class, 'store'])->name('save');
    Route::put('/products', [ProductController::class, 'update'])->name('update');
    Route::delete('/products', [ProductController::class, 'remove'])->name('remove');
});
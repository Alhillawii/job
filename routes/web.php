<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
// use App\Http\Controllers\JobsController;

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
Route::resource('products', ProductsController::class);

Route::get('/products',[ ProductsController::class,'index'])->name('products.index');

Route::get('/products/create',[ ProductsController::class,'create'])->name('products.create');

Route::get('/products/{product}',[ ProductsController::class,'show'])->name('products.show');

Route::get('/products/{product}/edit',[ ProductsController::class,'edit'])->name('products.edit');

Route::PUT('/products/{product}',[ ProductsController::class,'update'])->name('products.update');

Route::DELETE('/products/{product}',[ ProductsController::class,'destroy'])->name('products.destroy');

Route::post('/products',[ ProductsController::class,'store'])->name('products.store');



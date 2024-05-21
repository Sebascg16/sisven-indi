<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\CategoriaController;
use App\Http\Controllers\api\PaymodeController;
use App\Http\Controllers\api\CustomerController;
use App\Http\Controllers\api\ProductoController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/categorias', [CategoriaController::class, 'index'])->name('categorias.index');
Route::post('/categorias', [CategoriaController::class,'store'])->name('categorias.store');
Route::delete('/categorias/{categoria}',[CategoriaController::class, 'destroy'])->name('categorias.destroy');
Route::get('/categorias/{categoria}', [CategoriaController::class, 'show'])->name('categorias.show');
Route::put('/categorias/{categoria}', [CategoriaController::class, 'update'])->name('categorias.update');


Route::get('/paymodes', [PaymodeController::class,'index'])->name('paymodes.index');
Route::post('/paymodes', [PaymodeController::class, 'store'])->name('paymodes.store');
Route::get('/paymodes/{paymode}', [PaymodeController::class, 'show'])->name('paymodes.show');
Route::delete('/paymodes/{paymode}', [PaymodeController::class, 'destroy'])->name('paymodes.destroy');
Route::put('/paymodes/{paymode}', [PaymodeController::class, 'update'])->name('paymodes.update');

Route::get('/customers', [CustomerController::class,'index'])->name('customers.index');
Route::post('/customers', [CustomerController::class, 'store'])->name('customers.store');
Route::get('/customers/{customer}', [CustomerController::class, 'show'])->name('customers.show');
Route::delete('/customers/{customer}', [CustomerController::class, 'destroy'])->name('customers.destroy');
Route::put('/customers/{customer}', [CustomerController::class, 'update'])->name('customers.update');

Route::get('/productos',[ProductoController::class,'index'])->name('products.index');
Route::post('/productos', [ProductoController::class, 'store'])->name('products.store');
Route::get('/productos/{producto}', [ProductoController::class, 'show'])->name('products.show');
Route::delete('/productos/{producto}', [ProductoController::class, 'destroy'])->name('products.destroy');
Route::put('/productos/{producto}', [ProductoController::class, 'update'])->name('products.update');


<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Auth.login');
});
Route::get('/register', function () {
    return view('Auth.register');
});
Route::get('/forgotpass', function () {
    return view('Auth.forgot');
});
Route::post('/register', [AdminController::class, 'register'])->name('register');
Route::post('/login', [AdminController::class, 'login'])->name('login');
Route::get('/logout', [AdminController::class, 'logout']);


Route::get('/suppliers', [SupplierController::class, 'index'])->middleware('App\Http\Middleware\Auth');
Route::get('/create_supplier', [SupplierController::class, 'create'])->middleware('App\Http\Middleware\Auth');
Route::post('/suppliers', [SupplierController::class, 'store'])->name('supplier.store')->middleware('App\Http\Middleware\Auth');
Route::get('/update/{id}', [SupplierController::class,'get_data'])->name('updated')->middleware('App\Http\Middleware\Auth');
Route::put('/update/{id}', [SupplierController::class,'update'])->name('update')->middleware('App\Http\Middleware\Auth');
Route::delete('/delete/{id}', [SupplierController::class, 'delete'])->name('delete')->middleware('App\Http\Middleware\Auth');

Route::get('/products', [ProductController::class, 'index'])->middleware('App\Http\Middleware\Auth');
Route::get('/create_products', [ProductController::class, 'create'])->middleware('App\Http\Middleware\Auth');
Route::post('/products', [ProductController::class, 'store'])->middleware('App\Http\Middleware\Auth');
Route::get('/update_product/{id}', [ProductController::class, 'get_product'])->name('get_product')->middleware('App\Http\Middleware\Auth');
Route::put('/update_product/{id}', [ProductController::class, 'update'])->name('update')->middleware('App\Http\Middleware\Auth');
Route::delete('/delete/{id}', [ProductController::class, 'delete'])->name('delete')->middleware('App\Http\Middleware\Auth');

Route::get('/orders', [OrderController::class, 'index'])->middleware('App\Http\Middleware\Auth');
Route::get('/create_orders', [OrderController::class, 'create'])->middleware('App\Http\Middleware\Auth');
Route::post('/orders', [OrderController::class, 'store'])->name('orders.store')->middleware('App\Http\Middleware\Auth');
Route::get('/update_order/{id}', [OrderController::class, 'get_order'])->name('get_order')->middleware('App\Http\Middleware\Auth');
Route::put('/update_order/{id}', [OrderController::class, 'update'])->name('update')->middleware('App\Http\Middleware\Auth');
Route::delete('/delete/{id}', [OrderController::class, 'delete'])->name('delete')->middleware('App\Http\Middleware\Auth');

Route::get('/report', [OrderController::class, 'report'])->middleware('App\Http\Middleware\Auth');
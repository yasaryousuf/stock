<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SupplyController;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\AuthController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StockController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', [AuthController::class, 'dashboard']);
    Route::get('/', [AuthController::class, 'dashboard']);

    Route::resource('suppliers', SupplierController::class);
    Route::resource('customers', CustomerController::class);
    Route::resource('products', ProductController::class);
    Route::resource('supplies', SupplyController::class);
    Route::resource('orders', OrderController::class);
    Route::resource('categories', CategoryController::class);
});

Route::get('login', [AuthController::class, 'index'])->name('login');;
Route::post('login', [AuthController::class, 'postLogin']);
Route::get('registration', [AuthController::class, 'registration']);
Route::post('registration', [AuthController::class, 'postRegistration']);
Route::get('logout', [AuthController::class, 'logout']);

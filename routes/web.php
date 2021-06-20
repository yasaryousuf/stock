<?php

use App\Http\Controllers\CustomAuth\RegisterController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomAuth\LoginController;
use App\Http\Controllers\HomeController;
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
    Route::get('dashboard', [HomeController::class, 'dashboard']);
    Route::get('/', [HomeController::class, 'dashboard']);

    Route::resource('suppliers', SupplierController::class);
    Route::resource('customers', CustomerController::class);
    Route::resource('products', ProductController::class);
    Route::resource('supplies', SupplyController::class);
    Route::resource('orders', OrderController::class);
    Route::resource('categories', CategoryController::class);
});

Route::get('login', [LoginController::class, 'showLoginPage'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('registration', [RegisterController::class, 'showRegistrationPage']);
Route::post('registration', [RegisterController::class, 'registration']);

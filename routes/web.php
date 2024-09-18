<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;



Route::get('/', [LoginController::class, 'index']);
Route::get('login', [\App\Http\Controllers\LoginController::class, 'index'])->name('login');
Route::post('action-login', [\App\Http\Controllers\LoginController::class, 'actionLogin'])->name('action-login');
Route::get('keluar', function(){
    Auth::logout();
    alert()->info('See You Next Time','We Hope You Back Again');
    return redirect()->to('login');
})->name('keluar');



Route::resource('penjualan', \App\Http\Controllers\TransactionController::class);

Route::resource('dashboard', \App\Http\Controllers\DashboardController::class);
Route::resource('user', \App\Http\Controllers\UserController::class);
Route::resource('category', \App\Http\Controllers\CategoryController::class);
Route::resource('product', \App\Http\Controllers\ProductController::class);



Route::get('get-products/{category_id}', [TransactionController::class, 'getProducts']);
Route::get('get-product/{product_id}', [TransactionController::class, 'getProduct']);
Route::get('print/{id}', [TransactionController::class, 'print']);


<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/orders',App\Http\Controllers\OrderController::class);
Route::resource('/products',App\Http\Controllers\ProductController::class);
Route::resource('/suppliers',App\Http\Controllers\SupplierController::class);
Route::resource('/users',App\Http\Controllers\UserController::class);
Route::resource('/companies',App\Http\Controllers\CompanyController::class);
Route::resource('/transactions',App\Http\Controllers\TransactionController::class);
Route::get('/barcode',[App\Http\Controllers\ProductController::class,'GetProductBarcodes'])->name('products.barcode');
<?php

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DiscountsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;

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


Route::group(['middleware' => 'cekSession'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/productslist', [ProductsController::class, 'index']);
    Route::get('/productscategory', [ProductCategoryController::class, 'index']);
    Route::get('/checkout', [CheckoutController::class, 'index']);
});

Route::group(['middleware' => 'hasSession'], function () {
    Route::get('/', [LoginController::class, 'index']);
});
Route::get('/logout', [LoginController::class, 'logout']);

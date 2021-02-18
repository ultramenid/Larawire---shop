<?php

use Illuminate\Support\Facades\Artisan;
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

//route checking session
Route::group(['middleware' => 'cekSession'], function () {
    //route dashboard
    Route::get('/dashboard', function () {
        return view('pages.dashboard', [
            'title' => 'Welcome Page',
            'tabs' => 'dashboard'
        ]);
    });

    //route list products
    Route::get('/productslist', function () {
        return view('pages.products', [
            'title' => 'Products Page',
            'tabs' => 'products',
            'sub_tabs' => 'list'
        ]);
    });


    //route list category products
    Route::get('/productscategory', function () {
        return view('pages.categoryproduct', [
            'title' => 'Products Category',
            'tabs' => 'products',
            'sub_tabs' => 'category'
        ]);
    });

    //route checkout cart
    Route::get('/checkout', function () {
        return view('pages.checkout', [
            'title' => 'Checkout Page',
            'tabs' => 'none'
        ]);
    });
});

//route hase session
Route::group(['middleware' => 'hasSession'], function () {
    //route home
    Route::get('/', function () {
        return view('pages.login',[
            'title' => 'Login Page'
        ]);
    });
});

//route logout
Route::get('/logout', function () {
    session()->flush();
    return redirect('/');
});

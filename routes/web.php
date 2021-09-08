<?php

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
    return view('layout/auth');
});


Route::get('/login', function () {
    return view('layout/auth');
})->name('login');

Route::post('/postlogin', 'LoginController@postLogin')->name('postlogin');
Route::get('/daftar', 'LoginController@daftar');
Route::post('/daftar/store', 'LoginController@store');
Route::get('/logout', 'LoginController@logout')->name('logout');


// Authentikasi Login
Route::group(['middleware' => ['auth', 'cekLevel:admin,user,waiter,dapur']], function () {
    Route::get('/beranda', 'BerandaController@index');
});


Route::group(['middleware' => ['auth', 'cekLevel:admin']], function () {
    
    // Route::get('/beranda', 'BerandaController@index');
    // Route Pengguna
    Route::get('/penggunas', 'PenggunasController@index');
    Route::get('/penggunas/create', 'PenggunasController@create');
    Route::post('/penggunas/store', 'PenggunasController@store');
    Route::get('/penggunas/{pengguna}/edit', 'PenggunasController@edit');
    Route::put('/penggunas/{pengguna}', 'PenggunasController@update');
    Route::delete('/penggunas/{pengguna}', 'PenggunasController@destroy');
    Route::get('/penggunas/search', 'PenggunasController@search');
    Route::get('/penggunas/print', 'PenggunasController@print');

    // // Masakan Route
    // Route::get('/masakans', 'MasakansController@index');
    // Route::get('/masakans/create', 'MasakansController@create');
    // Route::post('/masakans/store', 'MasakansController@store');
    // Route::get('/masakans/{masakan}/edit', 'MasakansController@edit');
    // Route::put('/masakans/{masakan}', 'MasakansController@update');
    // Route::delete('/masakans/{masakan}', 'MasakansController@destroy');
    // Route::get('/masakans/search', 'MasakansController@search');


    // Route::get('/orders', 'OrdersController@index');
    // Route::get('/orders/create', 'OrdersController@create');
    // Route::get('/orders/search', 'OrdersController@search');
    // Route::get('/orders/{order}/new', 'OrdersController@new');
    // Route::post('/orders/store', 'OrdersController@store');

    // Route::get('/transactions', 'TransactionsController@index');
    // Route::get('/transactions/create', 'TransactionsController@create');
    // Route::post('/transactions/store', 'TransactionsController@store');

    // Route::get('/laporans', 'LaporansController@index');

});

Route::group(['middleware' => ['auth', 'cekLevel:admin,user,waiter,dapur']], function () {
    // Order Route
    Route::get('/orders', 'OrdersController@index');
    Route::get('/orders/create', 'OrdersController@create');
    Route::get('/orders/search', 'OrdersController@search');
    Route::get('/orders/{order}/new', 'OrdersController@new');
    Route::post('/orders/store', 'OrdersController@store');
});


Route::group(['middleware' => ['auth', 'cekLevel:admin,dapur']], function () {
    // Masakan Route
    Route::get('/masakans', 'MasakansController@index');
    Route::get('/masakans/create', 'MasakansController@create');
    Route::post('/masakans/store', 'MasakansController@store');
    Route::get('/masakans/{masakan}/edit', 'MasakansController@edit');
    Route::put('/masakans/{masakan}', 'MasakansController@update');
    Route::delete('/masakans/{masakan}', 'MasakansController@destroy');
    Route::get('/masakans/search', 'MasakansController@search');
    Route::get('/masakans/print', 'MasakansController@print');
});

Route::group(['middleware' => ['auth', 'cekLevel:admin,waiter']], function () {

    // Transaksi & Laporan Route

    Route::get('/transactions', 'TransactionsController@index');
    Route::get('/transactions/create', 'TransactionsController@create');
    Route::post('/transactions/store', 'TransactionsController@store');
    Route::get('/transactions/print', 'TransactionsController@print');

    Route::get('/laporans', 'LaporansController@index');
    Route::get('/laporans/print', 'LaporansController@print');
});



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
    return view('welcome');
});

Auth::routes();

Route::get('/login', 'AuthController@login')->name('login');
Route::post('/postlogin', 'AuthController@postlogin');
Route::get('/logout', 'AuthController@logout');

Route::group(['middleware' => ['auth', 'checkRole:admin,user']], function () {
    // Pages
    Route::get('/home', 'PagesController@home');

    // Detail
    Route::get('pesan/{id}', 'PesanController@show');
    // Submit Jumlah Pesan
    Route::post('pesan/{id}', 'PesanController@pesan');
    // Checkout
    Route::get('checkout', 'PesanController@checkout');
    // Hapus Checkout
    Route::delete('checkout/{id}', 'PesanController@destroy');

    Route::get('confirmcheckout', 'PesanController@confirm');

    Route::get('profile', 'ProfileController@index');
    Route::post('profile', 'ProfileController@update');

    Route::get('history', 'HistoryController@index');
    Route::get('history/{id}', 'HistoryController@detail');
});

Route::group(['middleware' => ['auth', 'checkRole:admin']], function() {
    // Pages
    Route::get('/dashboard', 'PagesController@dashboard');
    // Admin
    Route::get('/barang', 'BarangController@index');
    Route::get('/barang/create', 'BarangController@create');
    Route::post('/barang', 'BarangController@store');
    Route::get('/barang/{barang}', 'BarangController@show');
    Route::delete('/barang/{barang}', 'BarangController@destroy');
    Route::get('/barang/{barang}/edit', 'BarangController@edit');
    Route::patch('/barang/{barang}', 'BarangController@update');
});
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
    // Konfirmasi
    Route::get('confirmcheckout', 'PesanController@confirm');
    // Profile
    Route::get('profile', 'ProfileController@index');
    Route::post('profile', 'ProfileController@update');
    // history
    Route::get('history', 'HistoryController@index');
    Route::get('history/exportpdf', 'HistoryController@pdf');
    Route::get('history/preview/{data_pesanan}', 'HistoryController@preview');
    Route::get('history/{id}', 'HistoryController@detail');
    

    // Kategori
    Route::get('snack', 'KategoriController@snack');
    Route::get('minuman', 'KategoriController@minuman');
    Route::get('wafer', 'KategoriController@wafer');
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

    Route::get('/kategori', 'KategoriController@index');
    Route::get('/kategori/create', 'KategoriController@create');
    Route::post('/kategori', 'KategoriController@store');
    Route::get('/kategori/{kategori}', 'KategoriController@show');
    Route::delete('/kategori/{kategori}', 'KategoriController@destroy');
    Route::get('/kategori/{kategori}/edit', 'KategoriController@edit');
    Route::patch('/kategori/{kategori}', 'KategoriController@update');

    Route::get('/invoice', 'InvoiceController@index');
    // Route::get('/invoice/create', 'InvoiceController@create');
    // Route::post('/invoice', 'InvoiceController@store');
    Route::get('/invoice/{pesanan}', 'InvoiceController@show');
    Route::delete('/invoice/{pesanan}', 'InvoiceController@destroy');
    // Route::get('/invoice/{pesanan_detail}/edit', 'InvoiceController@edit');
    // Route::patch('/invoice/{pesanan_detail}', 'InvoiceController@update');

    
});
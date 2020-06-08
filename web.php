<?php

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
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

  Route::get('/peminjaman', 'PeminjamanController@index');
  Route::get('/peminjaman/create', 'PeminjamanController@create');
  Route::post('/peminjaman', 'PeminjamanController@store');
  Route::delete('/peminjaman/{pmjmn}', 'PeminjamanController@destroy');
  Route::get('/peminjaman/{pmjmn}/edit', 'PeminjamanController@edit');
  Route::patch('/peminjaman/{pmjmn}', 'PeminjamanController@update');
  
  Route::get('/pengembalian', 'PengembalianController@index');
  Route::get('/pengembalian/{pngmbln}/edit', 'PengembalianController@edit');
  Route::patch('/pengembalian/{pngmbln}', 'PengembalianController@update');
  

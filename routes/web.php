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

Route::resource('powerunit','Transaksi\PowerunitController');
Route::get('soalno2','Transaksi\PowerunitController@soalno2');
Route::get('soalno5','Transaksi\PowerunitController@soalno5');
Route::get('soalno7','Transaksi\PowerunitController@soalno7');
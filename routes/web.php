<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/','DashboardController@index')->name('default')->middleware('auth');
Auth::routes(['register'=>false]);
Route::resource('products','ProductController')->middleware('auth');
Route::resource('product-gallery','ProductGalleryController')->middleware('auth');
Route::get('/product/{id}/gallery','ProductController@gallery')->name('products.gallery');
Route::get('/transactions/{id}/set-status','TransactionController@setStatus')->name('transactions.status');
Route::resource('transactions','TransactionController');

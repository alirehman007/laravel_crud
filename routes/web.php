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

Route::get('/', 'productsController@index'); 
Route::get('/products','productsController@create')->name('products.create');
Route::post('/products','productsController@store')->name('products.store');
Route::get('/products/{products}','productsController@edit')->name('products.edit');
Route::post('/products/{products}','productsController@update')->name('products.update');
Route::delete('/products/{products}','productsController@destroy')->name('products.destroy');
Route::post('/','productsController@index')->name('products.index');
// Route::get('/upload','productsController@uploadForm');
// Route::post('/upload','productsController@uploadFile')->name('uploadfile');
// Route::get('image-upload', 'productsController@imageUpload')->name('image.upload');
// Route::post('image-upload', 'productsController@imageUploadPost')->name('image.upload.post');
Route::get('image','productsController@create')->name('image.create');
Route::post('image','productsController@store')->name('image.store');
Route::get('image/{id}','productsController@view')->name('image.view');
    // return view('welcome');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

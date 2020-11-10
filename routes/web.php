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

Route::redirect('/', '/blog');
//Route::get('/','App\Http\Controllers\BlogController@index');
//Route::get('/create','App\Http\Controllers\BlogController@create');
Route::resource('/blog','App\Http\Controllers\BlogController');




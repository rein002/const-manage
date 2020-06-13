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

Route::get('/browse/search', 'HomeController@search');
Route::get('/browse/searched', 'HomeController@searched');

Route::get('browse/register', 'HomeController@register');
Route::post('/browse/registered', 'HomeController@registered');

Route::get('/browse/edit/{id}', 'HomeController@edit');
Route::patch('/browse/edited/{id}', 'HomeController@edited');

Route::get('/browse/delete/{id}', 'HomeController@delete');
Route::delete('/browse/deleted/{id}', 'HomeController@deleted');
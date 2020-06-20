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


Auth::routes(['verify' => true]);


Route::get('/home', 'HomeController@index')->name('home');

Route::get('/browse/search', 'HomeController@search');
Route::get('/browse/searched', 'HomeController@searched');

/* 0613追記
    新規登録のリンクが消え、新規登録ができない問題が突然発生した。
    原因究明に時間がかかったが、ルーティング/registerがログイン機能Authの/registerと被っていたことが原因だと判明。
    /register → /browse/registerに修正することにより対処した。他のルーティングもこれに合わせて/browse/～に変更した。 */
Route::get('browse/register', 'HomeController@register');
Route::post('/browse/registered', 'HomeController@registered');

Route::get('/browse/edit/{id}', 'HomeController@edit');
Route::patch('/browse/edited/{id}', 'HomeController@edited');

Route::get('/browse/delete/{id}', 'HomeController@delete');
Route::delete('/browse/deleted/{id}', 'HomeController@deleted');


Route::get('/readme', 'ReadmeController@readme');


Route::get('/registrationCompleted', 'HomeController@registrationCompleted');
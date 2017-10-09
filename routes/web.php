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


Route::get('/','main@index');
Route::resource('watch','video');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('comments','comments2');
Route::resource('likedown','likedown');
Route::resource('likeup','likeup');
Route::resource('profil','profil');
Route::resource('search','search');
Route::get('watch/create','video@create')->middleware('auth');
Route::resource('screate','screate');
Route::resource('screatevideo','screatevideo');
Route::resource('screatesettings','screatesettings');
Route::resource('screateaddvideo','screateaddvideo');
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

Route::get('/', 'NewsController@gotonews')->name('stupidredirect');
Route::get('/news', 'NewsController@index')->name('index');
Route::get('/news/{title_uri}', 'NewsController@show')->name('show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin/news', 'NewsController@pageList')->name('pagelist')->middleware('auth');
Route::get('/admin/news/add', 'NewsController@add')->name('add')->middleware('auth');
Route::post('/admin/news/store', 'NewsController@store')->name('store')->middleware('auth');
Route::get('/admin/news/edit/{id}', 'NewsController@edit')->name('edit')->middleware('auth');
Route::post('/admin/news/update/{id}', 'NewsController@update')->name('update')->middleware('auth');
Route::get('/admin/news/delete/{id}', 'NewsController@delete')->name('delete')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

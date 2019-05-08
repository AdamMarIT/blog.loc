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

Route::get('/', 'PostController@index')->name('home');
Route::get('/article/{id}', 'PostController@article');
Route::post ('/add_post', 'PostController@store')->middleware('auth');
Route::get('/add_post', 'PostController@add')->middleware('auth');
Route::post('/comment/{id}', 'PostController@storeComment')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

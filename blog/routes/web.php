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

Route::group(['middleware' => ['auth','admin']], function () {
  Route::get('/admin', 'AdminController@indexAdmin');
  Route::post('/delete_post/{id}', 'AdminController@deletePost');
  Route::get('/article/{id}/admin', 'AdminController@articleAdmin');
  Route::post('/edit_comment/{id}', 'AdminController@editComment');
  Route::post('/delete_comment/{id}', 'AdminController@deleteComment');
});

//Route::get('/home', 'HomeController@index')->name('home');

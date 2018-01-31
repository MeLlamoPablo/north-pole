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

Route::get('/', 'HomeController@index')->name('home');

Route::get('/files', 'FileController@index')->name('allFiles');
Route::get('/files/create', 'FileController@create');
Route::post('/files', 'FileController@store')->name('storeFile');

Route::get('/users/{user}', 'UserController@index');
Route::get('/profile', 'UserController@ownUser');

Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');
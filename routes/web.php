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
Route::get('/files/create', 'FileController@create')->name('createFile');
Route::get('/files/{file}', 'FileController@show')->name('fileDetail');
Route::get('/files/{file}/owners', 'FileOwnerController@index')->name('allFileOwners');

Route::post('/files', 'FileController@store')->name('storeFile');
Route::post('/files/{file}/owners', 'FileOwnerController@store')->name('storeFileOwner');

Route::get('/users/{user}', 'UserController@index')->name('userDetail');
Route::get('/profile', 'UserController@ownUser')->name('ownUserDetail');

Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');

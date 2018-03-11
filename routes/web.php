<?php

// Rutas públicas

Route::get('/', 'HomeController@index')->name('home');
Auth::routes();

// Rutas privadas

Route::get('/files', 'FileController@index')->name('allFiles');
Route::get('/files/create', 'FileController@create')->name('createFile');
Route::get('/files/{file}', 'FileController@show')->name('fileDetail');
Route::get('/files/{file}/download', 'FileController@download')->name('downloadFile');
Route::get('/files/{file}/owners', 'FileOwnerController@index')->name('allFileOwners');

Route::post('/files', 'FileController@store')->name('storeFile');
Route::post('/files/{file}/owners', 'FileOwnerController@store')->name('storeFileOwner');

Route::put('/files/{file}', 'FileController@update')->name('updateFile');
Route::delete('/files/{file}', 'FileController@destroy')->name('deleteFile');

Route::get('/profile', 'UserController@ownUser')->name('ownUserDetail');
Route::get('/users/{user}', 'UserController@index')->name('userDetail');
Route::put('/users/{user}', 'UserController@update')->name('updateUser');

Route::get('/logout', 'Auth\LoginController@logout');

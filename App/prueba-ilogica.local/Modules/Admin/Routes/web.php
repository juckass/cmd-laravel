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


Route::prefix('backend')->middleware(['auth', 'web'])->group(function() {
  
    // Authentication Routes...
    Route::get('/', 'AdminController@index');

    Route::get('/user', 'UserController@index')->name('user');
    Route::get('/user/datatable', 'UserController@datatable')->name('datatable.user');
    Route::get('/user/eliminar', 'UserController@destroy')->name('delete.user');
    Route::get('/user/crear', 'UserController@create')->name('crear.user');
    Route::post('/user/crear', 'UserController@store')->name('store.user');
    Route::get('/user/edit/{user}', 'UserController@edit')->name('edit.user');
    Route::post('/user/update', 'UserController@update')->name('update.user');


});

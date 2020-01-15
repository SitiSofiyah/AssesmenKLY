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

Route::get('/', function () {
	return view('auth/login');
    
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/insert_data', 'DataController@index')->name('insert_data');

Route::post('/insert_data/proses', 'DataController@create');

Route::get('/edit_data/{file}', 'DataController@form_edit');

Route::post('/edit_data/proses/{file}', 'DataController@edit');

Route::get('/delete_data/{file}/{image}', 'DataController@delete');

Route::get('/account', 'AccountController@index')->name('account');

Route::get('/update_akun/{id}', 'AccountController@update_form');

Route::post('/update_akun/proses_update/{id}', 'AccountController@update');

Route::get('/delete_akun/{id}', 'AccountController@delete');


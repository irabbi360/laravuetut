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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/customer', 'CustomerController@index');
Route::post('/customer-save', 'CustomerController@save');
Route::get('/customer-list', 'CustomerController@customerList');
Route::get('/customer-edit/{id}', 'CustomerController@edit');
Route::post('/customer-update/{id}', 'CustomerController@customerUpdate');
Route::post('/delete/{id}', 'CustomerController@delete');

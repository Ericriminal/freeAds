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

Route::get('/', 'UserController@ShowIndex');

Route::get('register', 'UserController@ShowRegister');

Route::post('register', 'UserController@StoreRegister');

Route::get('login', 'UserController@ShowLogin');

Route::post('login', 'UserController@Login');

Route::get('logout', 'UserController@Logout');

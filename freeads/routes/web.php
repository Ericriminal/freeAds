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

Route::get('/', 'IndexController@showIndex');

Route::get('login', 'NewUserController@ShowLogin');

Route::post('login', 'NewUserController@Login');

Route::get('logout', 'NewUserController@Logout');

Route::get('register', 'NewUserController@ShowRegister');

Route::post('register', 'NewUserController@Store');

Route::get('delete/{id}', 'NewUserController@Delete');

Route::get('edit/{id}', 'NewUserController@Edit');

Route::post('edit/{id}', 'NewUserController@EditStore');

Route::get('edit_password/{id}', 'NewUserController@ShowEditPassword');

Route::post('edit_password/{id}', 'NewUserController@StoreEditPassword');

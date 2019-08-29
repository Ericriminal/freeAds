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

Route::get('/', 'indexController@showIndex');

Route::get('register', 'newUserController@showRegister');

Route::post('register', 'newUserController@storeRegister');

Route::get('login', 'newUserController@showLogin');

Route::post('login', 'newUserController@login');

Route::get('logout', 'newUserController@logout');

Route::get('send_message', 'messageController@showSendMessage');

Route::post('send_message', 'messageController@storeSendMessage');

Route::get('received_messages', 'messageController@showReceivedMessages');


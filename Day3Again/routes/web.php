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

Route::get('/', 'NewUserController@ShowIndex');

Route::get('register', 'NewUserController@ShowRegister');

Route::post('register', 'NewUserController@StoreRegister');

Route::get('login', 'NewUserController@ShowLogin');

Route::post('login', 'NewUserController@Login');

Route::get('logout', 'NewUserController@Logout');

Route::get('edit', 'NewUserController@ShowEdit');

Route::post('edit', 'NewUserController@StoreEdit');

Route::get('edit_password', 'NewUserController@ShowEditPassword');

Route::post('edit_password', 'NewUserController@StoreEditPassword');

Route::get('edit_adds', 'AddsController@ShowAdds');

Route::post('edit_adds', 'AddsController@PostActionAdd');

Route::get('edit_old_add', 'AddsController@ShowEditOldAdd');

Route::post('edit_old_add', 'AddsController@StoreEditOldAdd');

Route::get('create_add', 'AddsController@ShowCreateAdd');

Route::post('create_add', 'AddsController@StoreAdd');

Route::get('admin', 'AdminController@ShowAdmin');

Route::post('admin', 'AdminController@PostActionAdminAccount');

Route::get('admin_edit_account', 'AdminController@ShowAdminEditAccount');

Route::post('admin_edit_account', 'AdminController@StoreAdminEditAccount');

Route::get('admin_create_account', 'AdminController@ShowAdminCreateAccount');

Route::post('admin_create_account', 'AdminController@StoreAdminRegister');

Route::get('search_add', 'searchController@showSearch');

Route::post('search_add', 'searchController@postSearch');

Route::get('search_result', 'searchController@showSearchResult');

Route::post('search_result', 'searchController@postShowSearchResult');

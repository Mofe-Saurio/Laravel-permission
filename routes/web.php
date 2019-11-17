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

Route::get('/', 'Auth\LoginController@showLoginForm')->name('login');
Route::get('users-list', 'UsersController@usersList');
Route::post('users-create', 'UsersController@crearUsuario')->name('users-create');
Route::put('users-changerol', 'UsersController@changeRol')->name('users-changerol');

Auth::routes();

Route::get('/home', 'UsersController@index')->name('home');

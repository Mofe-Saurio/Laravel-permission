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
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');


Auth::routes();

Route::get('/home', 'HomeController')->name('home');


Route::middleware(['auth'])->group(function () {
    //Users
    Route::get('users', 'UsersController@index')->name('users.index')->middleware('permission:users.index');

    Route::get('users/view/create', 'UsersController@create')->name('users.create')
        ->middleware('permission:users.create');

    Route::get('users/{user}/edit', 'UsersController@edit')->name('users.edit')
        ->middleware('permission:users.edit');

    Route::get('users/{user}', 'UsersController@show')->name('users.show')
        ->middleware('permission:users.show');

    Route::delete('users/{user}', 'UsersController@destroy')->name('users.destroy')
        ->middleware('permission:users.destroy');

    Route::put('users/{user}', 'UsersController@update')->name('users.update')
        ->middleware('permission:users.edit');

    Route::post('users/store', 'UsersController@store')->name('users.store')
        ->middleware('permission:users.create');


    //Roles
    Route::get('roles', 'RoleController@index')->name('roles.index')
        ->middleware('permission:roles.index');

    Route::get('roles/{role}', 'RoleController@show')->name('roles.show')
        ->middleware('permission:roles.show');

    Route::get('roles/{role}/edit', 'RoleController@edit')->name('roles.edit')
        ->middleware('permission:roles.edit');

    Route::delete('roles/{role}', 'RoleController@destroy')->name('roles.destroy')
        ->middleware('permission:roles.destroy');

    Route::get('roles/view/create', 'RoleController@create')->name('roles.create')
        ->middleware('permission:roles.create');

    Route::post('roles/store', 'RoleController@store')->name('roles.store')
        ->middleware('permission:roles.create');

    Route::put('roles/{role}', 'RoleController@update')->name('roles.update')
        ->middleware('permission:roles.edit');






    //Products
    Route::post('products/store', 'ProductController@store')->name('products.store')
        ->middleware('permission:products.create');
    Route::get('products', 'ProductController@index')->name('products.index')
        ->middleware('permission:products.index');
    Route::get('products/create', 'ProductController@create')->name('products.create')
        ->middleware('permission:products.create');
    Route::put('products/{product}', 'ProductController@update')->name('products.update')
        ->middleware('permission:products.edit');
    Route::get('products/{product}', 'ProductController@show')->name('products.show')
        ->middleware('permission:products.show');
    Route::delete('products/{product}', 'ProductController@destroy')->name('products.destroy')
        ->middleware('permission:products.destroy');
    Route::get('products/{product}/edit', 'ProductController@edit')->name('products.edit')
        ->middleware('permission:products.edit');
});

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

Route::get('home', 'HomeController@index')->name('home');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

Route::get('admin/entry', 'Admin\EntryController@index')->name('admin.entry');
Route::get('admin/entry/index', 'Admin\EntryController@index')->name('admin.entry.index');
Route::get('admin/entry/create', 'Admin\EntryController@create')->name('admin.entry.create');
Route::post('admin/entry/store', 'Admin\EntryController@store')->name('admin.entry.store');
Route::get('admin/entry/edit/{id}', 'Admin\EntryController@edit')->name('admin.entry.edit');
Route::put('admin/entry/update/{id}', 'Admin\EntryController@update')->name('admin.entry.update')->middleware('self.entry');

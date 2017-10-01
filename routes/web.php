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

Route::get('', function () {
    return view('welcome');
})->name('root');

Route::get('home', 'HomeController@index')->name('home');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('loginPost');
Route::post('logout', 'Auth\LoginController@logout')->name('logoutPost');

Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register')->name('registerPost');

Route::get('entry', 'EntryController@index')->name('entry');
Route::get('entry/index', 'EntryController@index')->name('entry.index');
Route::get('entry/view/{id}', 'EntryController@view')->name('entry.view')->where('id', '[0-9]+');

Route::post('comment', 'CommentController@store')->name('commentPost');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin'], function () {
    Route::get('', 'EntryController@index')->name('');
    Route::get('entry', 'EntryController@index')->name('.entry');
    Route::get('entry/index', 'EntryController@index')->name('.entry.index');
    Route::get('entry/create', 'EntryController@create')->name('.entry.create');
    Route::post('entry/store', 'EntryController@store')->name('.entry.storePost');
    Route::get('entry/edit/{id}', 'EntryController@edit')->name('.entry.edit')->where('id', '[0-9]+');
    Route::put('entry/update/{id}', 'EntryController@update')->name('.entry.updatePost')->where('id', '[0-9]+')->middleware('self.entry');
});

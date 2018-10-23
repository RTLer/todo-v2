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
Route::get('/todo', 'TodoController@index')->name('todo.index');
Route::get('/todo/create', 'TodoController@create')->name('todo.create');
Route::post('/todo/store', 'TodoController@store')->name('todo.store');
Route::get('/todo/edit/{id}', 'TodoController@edit')->name('todo.edit');
Route::post('/todo/update/{id}', 'TodoController@update')->name('todo.update');
Route::get('/todo/destroy/{id}', 'TodoController@destroy')->name('todo.destroy');

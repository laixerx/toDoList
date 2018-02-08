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

Route::get('/', 'HomeController@index')->name('home');

Route::get('tasks','TaskController@index')->name('task.index');
Route::post('task/add', 'TaskController@addTask')->name('task.add');
Route::delete('task/delete/{id}', 'TaskController@destroy')->name('task.destroy');
Route::post('task/completed/{id}', 'TaskController@completed')->name('task.completed');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout' , 'HomeController@out')->name('out');

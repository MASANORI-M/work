<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/works', 'WorkController@index')->name('work.list');
Route::get('/work/new', 'WorkController@create')->name('work.new');
Route::post('/work', 'WorkController@store')->name('work.store');
Route::get('/work/edit/{id}', 'WorkController@edit')->name('work.edit');
Route::post('/work/update/{id}', 'WorkController@update')->name('work.update');

Route::get('/work/{id}', 'WorkController@show')->name('work.detail');
Route::delete('/work/{id}', 'WorkController@destroy')->name('work.destroy');

Route::get('/', function () {
    return redirect('/works');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

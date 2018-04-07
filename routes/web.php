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
Route::post('/add','HomeController@add');
Route::post('/store','HomeController@store');
Route::post('/edit','HomeController@edit');
Route::post('/update','HomeController@update');

Route::get('/master','AdminController@index');
Route::get('/masterlogout','AdminController@loggedout');
Route::post('/addStudent','AdminController@store');
Route::post('listStudent','AdminController@list');
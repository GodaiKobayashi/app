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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/profiles', 'ProfileController@index');
Route::get('/profiles/create', 'ProfileController@create');

Route::get('/profiles/{profile}', 'ProfileController@show')->name('profile.show');

Route::post('/profiles/store', 'ProfileController@store')->name('profile.store');
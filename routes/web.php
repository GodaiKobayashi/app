<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
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
    return redirect('/login');
});

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/add', 'HomeController@add')->name('add');
Route::get('/result/ajax', 'HomeController@getData');

Route::get('/profiles', 'ProfileController@index')->name('profile.index');
Route::get('/profiles/create', 'ProfileController@create');
Route::get('/profiles/{profile}/edit', 'ProfileController@edit')->name('profile.edit');

Route::get('/profiles/{profile}', 'ProfileController@show')->name('profile.show');

Route::post('/profiles/store', 'ProfileController@store')->name('profile.store');

Route::put('/profiles/{profile}/update', 'ProfileController@update')->name('profile.update');

Route::delete('/profiles/{profile}/destroy', 'ProfileController@destroy')->name('profile.destroy');
Auth::routes();




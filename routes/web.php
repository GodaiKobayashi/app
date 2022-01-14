<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TwitterController;
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

Route::prefix('profiles')->group(function(){
    Route::get('/', 'ProfileController@index')->name('profile.index');
    Route::get('/create', 'ProfileController@create')->name('profile.create');
    Route::get('/{profile}/edit', 'ProfileController@edit')->name('profile.edit');
    Route::get('/my', 'ProfileController@my')->name('profile.my');
    Route::get('/{profile}', 'ProfileController@show')->name('profile.show');
    
    Route::post('/store', 'ProfileController@store')->name('profile.store');
    
    Route::put('/{profile}/update', 'ProfileController@update')->name('profile.update');
});

Auth::routes();

Route::get('/how', 'ProfileController@how')->name('how');

Route::get('/search', 'ProfileController@search')->name('search');

// ログインURL
Route::get('auth/twitter', 'Auth\TwitterController@redirectToProvider');
// コールバックURL
Route::get('auth/twitter/callback', 'Auth\TwitterController@handleProviderCallback');
// ログアウトURL
Route::get('auth/twitter/logout', 'Auth\TwitterController@logout');


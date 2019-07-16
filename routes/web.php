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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


//Search
Route::get('search', 'SearchController@search')->name('search');


Route::middleware(['auth'])->group(function() {
    Route::get('/home', 'LocationController@index')->name('home');
    Route::get('/locations/car/{car}/{carName}', 'LocationController@create')->name('location.create');
    Route::post('/locations/car/{car}', 'LocationController@store')->name('location.store');
    Route::get('/locations/{location}', 'LocationController@show')->name('location.show');
    Route::delete('/locations/{location}', 'LocationController@destroy')->name('location.destroy');
});

/**
 * Admin routes
 */
Route::get('/admin', 'AdminController@index')->name('admin');

Route::name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::resource('cars', 'CarController');
});

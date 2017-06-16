<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'HomeController@index');
Route::post('/', 'HomeController@BookByPhoneNumber');

Route::resource('customer', 'CustomerController');
Route::resource('cleaner', 'CleanerController');
Route::resource('booking', 'BookingController');
Route::resource('city', 'CityController');
Auth::routes();
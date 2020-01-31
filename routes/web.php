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
    return view('auth/login');
});


Auth::routes();

Route::get('/home', 'HomeController@index');
Route::resource('/cars', 'CarController');
Route::resource('/drivers', 'DriverController');
Route::resource('/users', 'UserController');
Route::resource('/delivery', 'DeliveryController');
Route::resource('/tracking', 'TrackerController');
Route::resource('/reports', 'ReportController');

Route::post('/delivery/update-status/{id}', 'DeliveryController@updateStatus');
Route::get('/tracking/search/{id}', 'TrackerController@searchDriver');
Route::post('/reports/search/{periode}', 'ReportController@search');
Route::get('/reports/print/{periode}', 'ReportController@print');
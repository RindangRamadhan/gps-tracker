<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::get('/v1', function () {
  return [
    "name" => "API GPS Tracker for Android",
    "version" => "1.0.0",
    "author" => "Rindang Ramadhan",
  ];
});

// Login route - Authentication - No
Route::post('v1/login', 'v1\LoginController@login');

// Logout route - Authentication - Middleware('auth:api')
Route::post('v1/logout', 'v1\LoginController@logout')->middleware('auth:api');
Route::post('v1/tracker', 'v1\TrackerController@store')->middleware('auth:api');

Route::middleware('auth:api')->get('/user', function (Request $request) {
  return $request->user();
});

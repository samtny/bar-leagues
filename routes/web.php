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

$domain = config('domain.name', 'localhost');

Route::domain('{subdomain}.' . $domain)->middleware('domain')->group(function () {
    Route::get('/', 'AssociationsController@home');
});

Route::prefix('{subdomain}')->middleware('domain')->group(function () {
    Route::get('/', 'AssociationsController@home');
});

Route::get('/', function () {
    return view('welcome');
});

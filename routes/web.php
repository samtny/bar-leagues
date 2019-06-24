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

Route::domain('{association}.' . $domain)->group(function () {
    Route::get('admin', 'AssociationsController@admin');
    Route::get('/', 'AssociationsController@home');
});

Route::prefix('{association}')->group(function () {
    Route::get('admin', 'AssociationsController@admin');
    Route::get('/', 'AssociationsController@home');
});

Route::get('/admin', function () {
    return view('admin');
});

Route::get('/', function () {
    return view('welcome');
});

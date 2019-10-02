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
})->middleware('auth');

Route::get('/home', function () {
    return view('welcome');
})->middleware('auth');

Auth::routes(['register' => false]);

// Resource Routes
Route::resource('/resources', 'ResourcesController')->middleware('auth');

//Download Resource
Route::get('/resources/{resource}', 'ResourcesController@download');

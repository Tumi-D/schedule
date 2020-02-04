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
});

Auth::routes();

Route::get('/sendmail', 'SendMailController@index')->name('mail');
Route::get('/schedule', 'SendMailController@schedule')->name('schedule');
Route::get('/assign', 'SendMailController@assign')->name('assign');
Route::any("/admin/{any?}", 'AdminController@index')->where("any", ".*")->middleware("auth");

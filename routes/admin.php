<?php

use Illuminate\Http\Request;





Route::apiResource('users', 'AdminApi\UserController');
Route::apiResource('locations', 'AdminApi\LocationController');
Route::apiResource('teams', 'AdminApi\TeamController');
Route::put('update/{id}', 'AdminApi\UserController@updateuser');
Route::get('roles', 'AdminApi\UserController@roles');
Route::get('/recentschedule', 'RunScheduleController@recentSchedule')->name('recentchedule');
Route::get('activities', 'AdminApi\ActivityController@index')->name('activities');
Route::get('/read/{id}', 'AdminApi\ActivityController@mark')->name('mark');

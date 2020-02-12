<?php

use Illuminate\Http\Request;





Route::apiResource('users', 'AdminApi\UserController');
Route::apiResource('locations', 'AdminApi\LocationController');
Route::get('roles', 'AdminApi\UserController@roles');
Route::get('/recentschedule', 'RunScheduleController@recentSchedule')->name('recentchedule');
Route::get('activities', 'AdminApi\ActivityController@index')->name('activities');

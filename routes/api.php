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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::apiResource('users', 'AdminApi\UserController');
Route::apiResource('locations', 'AdminApi\LocationController');
Route::get('roles', 'AdminApi\UserController@roles');
Route::get('/recentschedule', 'RunScheduleController@recentSchedule')->name('recentchedule');

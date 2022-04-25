<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('raawa-api', 'App\Http\Controllers\RaawaApiController@expiredRaawaAPI');
Route::get('raawa-api7days', 'App\Http\Controllers\RaawaApiController@expiredRaawa7daysAPI');
Route::get('sec-api', 'App\Http\Controllers\RaawaApiController@expiredSecAPI');
Route::get('sec-api30days', 'App\Http\Controllers\RaawaApiController@expiredSec30daysAPI');
Route::get('sec-active', 'App\Http\Controllers\RaawaApiController@secActive');
Route::get('raawa-active', 'App\Http\Controllers\RaawaApiController@raawaActive');
Route::post('bot-user', 'App\Http\Controllers\RaawaApiController@bot_user');
Route::get('bot-user-list', 'App\Http\Controllers\RaawaApiController@bot_user_list');

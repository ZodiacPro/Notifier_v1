<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes(['register' => true]);




Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');
Route::get('/dashboard-user', 'App\Http\Controllers\HomeController@user_dashboard')->name('home.user')->middleware('auth');
Route::get('/dashboard-area/choose', 'App\Http\Controllers\HomeController@area_dashboard_index')->name('home.area')->middleware('auth');
Route::get('dashboard/area/{id}', ['as' => 'home.area_main', 'uses' => 'App\Http\Controllers\HomeController@area_dashboard'])->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
		Route::get('icons', ['as' => 'pages.icons', 'uses' => 'App\Http\Controllers\PageController@icons']);
		Route::get('maps', ['as' => 'pages.maps', 'uses' => 'App\Http\Controllers\PageController@maps']);
		Route::get('notifications', ['as' => 'pages.notifications', 'uses' => 'App\Http\Controllers\PageController@notifications']);
		Route::get('rtl', ['as' => 'pages.rtl', 'uses' => 'App\Http\Controllers\PageController@rtl']);
		Route::get('tables', ['as' => 'pages.tables', 'uses' => 'App\Http\Controllers\PageController@tables']);
		Route::get('typography', ['as' => 'pages.typography', 'uses' => 'App\Http\Controllers\PageController@typography']);
		Route::get('upgrade', ['as' => 'pages.upgrade', 'uses' => 'App\Http\Controllers\PageController@upgrade']);
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

Route::group(['middleware' => 'auth'], function () {
	Route::get('list', ['as' => 'data.list', 'uses' => 'App\Http\Controllers\DataManagementController@index']);
	Route::post('list', ['as' => 'data.list', 'uses' => 'App\Http\Controllers\DataManagementController@index']);
	Route::get('area', ['as' => 'data.area', 'uses' => 'App\Http\Controllers\DataManagementController@area']);
	Route::post('area/create', ['as' => 'data.area_create', 'uses' => 'App\Http\Controllers\DataManagementController@create_area']);
	Route::get('ajaxlist', ['as' => 'data.ajaxlist', 'uses' => 'App\Http\Controllers\DataManagementController@data_list']);
	Route::get('upload', ['as' => 'data.upload', 'uses' => 'App\Http\Controllers\DataManagementController@upload_index']);
	Route::post('uploadfile', ['as' => 'data.uploadfile', 'uses' => 'App\Http\Controllers\DataManagementController@upload_file']);
	Route::get('expired_raawa', ['as' => 'data.expired_raawa', 'uses' => 'App\Http\Controllers\DataManagementController@expired_raawa']);
	Route::get('expired_sec', ['as' => 'data.expired_sec', 'uses' => 'App\Http\Controllers\DataManagementController@expired_sec']);
	Route::get('export/{id}', ['as' => 'data.export', 'uses' => 'App\Http\Controllers\DataManagementController@export']);
	//
	Route::get('expired/user', ['as' => 'data.expired_user', 'uses' => 'App\Http\Controllers\DataManagementController@expired_index_user']);
	Route::get('expired_raawa/user', ['as' => 'data.expired_raawa_user', 'uses' => 'App\Http\Controllers\DataManagementController@expired_raawa_user']);
	Route::get('expired_sec/user', ['as' => 'data.expired_sec_user', 'uses' => 'App\Http\Controllers\DataManagementController@expired_sec_user']);
	Route::get('export/user/{id}', ['as' => 'data.export_user', 'uses' => 'App\Http\Controllers\DataManagementController@export_user']);

});

Route::group(['middleware' => ['auth','admin']], function () {
	Route::get('raawa_user', ['as' => 'raawa.user', 'uses' => 'App\Http\Controllers\RaawaUserController@raawa_user']);
	Route::post('raawa_user', ['as' => 'raawa.user', 'uses' => 'App\Http\Controllers\RaawaUserController@raawa_user']);
	Route::post('user_create', ['as' => 'raawa.user_create', 'uses' => 'App\Http\Controllers\RaawaUserController@create_user']);
	Route::post('user_update', ['as' => 'raawa.user_update', 'uses' => 'App\Http\Controllers\RaawaUserController@update_user']);
	Route::post('user_delete', ['as' => 'raawa.user_delete', 'uses' => 'App\Http\Controllers\RaawaUserController@delete_user']);
	Route::post('update_raawa', ['as' => 'raawa.update', 'uses' => 'App\Http\Controllers\RaawaUserController@update_raawa']);
	Route::post('update_sec', ['as' => 'sec.update', 'uses' => 'App\Http\Controllers\RaawaUserController@update_sec']);
	Route::get('expired', ['as' => 'data.expired', 'uses' => 'App\Http\Controllers\RaawaUserController@expired']);
	Route::post('expired', ['as' => 'data.expired', 'uses' => 'App\Http\Controllers\RaawaUserController@expired']);
	Route::get('sec_expired', ['as' => 'data.expired.sec', 'uses' => 'App\Http\Controllers\RaawaUserController@expired_sec']);
	Route::post('sec_expired', ['as' => 'data.expired.sec', 'uses' => 'App\Http\Controllers\RaawaUserController@expired_sec']);
	Route::post('import', ['as' => 'import', 'uses' => 'App\Http\Controllers\RaawaUserController@import']);
	Route::get('template', ['as' => 'template', 'uses' => 'App\Http\Controllers\RaawaUserController@downloadtemplate']);
	Route::get('template-expired', ['as' => 'template.expired', 'uses' => 'App\Http\Controllers\RaawaUserController@downloadtemplate1']);
	Route::post('importraawa', ['as' => 'import.raawa', 'uses' => 'App\Http\Controllers\RaawaUserController@importraawa']);
	Route::post('importsec', ['as' => 'import.sec', 'uses' => 'App\Http\Controllers\RaawaUserController@importsec']);
});


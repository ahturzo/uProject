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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function()
{
	Route::get('/dashboard', function () {
    	return view('home');
	});
	
	Route::get('addProject', 'ProjectDetailsController@createProject');
	Route::post('saveProject', 'ProjectDetailsController@storeProject');

	Route::get('approveProject', 'ProjectDetailsController@notAcceptyet');
	Route::post('acceptProject', 'ProjectDetailsController@acceptProject');

	Route::get('project_status', 'ProjectDetailsController@projectStatus');

	Route::get('userProfile', 'UserController@userProfile');
	Route::post('refer', 'UserController@referFriend');
	Route::get('adminPanel', 'UserController@adminPanel');
	Route::post('addAdmin', 'UserController@addAdmin');
});

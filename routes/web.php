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

Route::get('/', 'IndexController@index')->name('home');

#Single land route
Route::get('/land/{id}', 'LandController@index')->name('single-land');

#Land's list by category
Route::get('/category/{slug}', 'LandController@show')->name('lands-list');

#Land's list
Route::get('lands', 'LandController@filteredLands')->name('lands');

#Blog single
Route::get('blog/{id}', 'NewsController@show')->name('blog-single');

#Get assignment for filter
Route::prefix('ajax')->group(function () {
    Route::post('getAssignment', 'AjaxController@getAssignment')->name('get-assignment');

    //Get data for main map
    Route::get('getJsonDataMainMap', 'AjaxController@getJsonDataMap');
});

/************* ADMIN ROUTES *************/
Route::prefix('admin')->group(function() {
// Authentication Routes
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');
});

Route::middleware('auth')->prefix('admin')->group(function() {
    // Dashboard
    Route::get('dashboard', 'Admin\AdminController@index');

    // Lands
    Route::get('lands', 'Admin\LandsController@index');

    #edit
    Route::get('lands/edit/{id}', 'Admin\LandsController@edit')->name('admin-land-edit');
    Route::post('lands/edit/{id}', 'Admin\LandsController@update')->name('admin-upd-land');

    #create
    Route::get('lands/create', 'Admin\LandsController@create')->name('admin-land-form-create');
    Route::post ('lands/create', 'Admin\LandsController@store')->name('admin-land-create');
});


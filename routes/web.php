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
});
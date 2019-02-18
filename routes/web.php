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
Route::get('/catalog/item/{id}/view', 'LandController@index')->name('single-land');

#Land's list by category
Route::get('/catalog/category/{slug}/view', 'LandController@show')->name('lands-list');

#Land's list
Route::get('lands', 'LandController@filteredLands')->name('lands');

#Blog
Route::get('news', 'NewsController@index')->name('news-list');
Route::get('news/{id}/view', 'NewsController@show')->name('news-single');

#About Us
Route::get('company', 'IndexController@aboutUsPage')->name('about-us');

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
    # Dashboard
    Route::get('dashboard', 'Admin\AdminController@index');

    # Lands List
    Route::get('lands', 'Admin\LandsController@index');

    # Edit Land
    Route::get('lands/edit/{id}', 'Admin\LandsController@edit')->name('admin-land-edit');
    Route::post('lands/edit/{id}', 'Admin\LandsController@update')->name('admin-upd-land');

    # Create Land
    Route::get('lands/create', 'Admin\LandsController@create')->name('admin-land-form-create');
    Route::post ('lands/create', 'Admin\LandsController@store')->name('admin-land-create');

    # Delete Land
    Route::get('lands/delete/{id}', 'Admin\LandsController@destroy')->name('admin-land-delete');

    # News List
    Route::get('news', 'Admin\NewsController@index');

    # News Edit
    Route::get('news/edit/{id}', 'Admin\NewsController@edit')->name('admin-news-edit');
    Route::post('news/edit/{id}', 'Admin\NewsController@update')->name('admin-upd-news');

    # Create News
    Route::get('news/create', 'Admin\NewsController@create')->name('admin-news-form-create');
    Route::post ('news/create', 'Admin\NewsController@store')->name('admin-news-create');

    # Delete News
    Route::get('news/delete/{id}', 'Admin\NewsController@destroy')->name('admin-news-delete');

    # Category News
    Route::get('news/category/list', 'Admin\NewsController@categoryList')->name('admin-news-category-list');

    # News Category Edit
    Route::get('news/category/edit/{id}', 'Admin\NewsController@categoryEdit')->name('admin-news-category-edit');
    Route::post('news/category/edit/{id}', 'Admin\NewsController@categoryUpdate')->name('admin-news-category-upd');

    # Create category News
    Route::get('news/category/create', 'Admin\NewsController@categoryCreate')->name('admin-news-category-create');
    Route::post ('news/category/create', 'Admin\NewsController@categoryStore')->name('admin-news-category-store');

    # Delete Category News
    Route::get('news/category/delete/{id}', 'Admin\NewsController@categoryDestroy')->name('admin-news-category-delete');

    # Regions List
    Route::get('regions', 'Admin\RegionController@index');

    # Region Edit
    Route::get('region/edit/{id}', 'Admin\RegionController@edit')->name('admin-region-edit');
    Route::post('region/edit/{id}', 'Admin\RegionController@update')->name('admin-upd-region');

    # Create Region
    Route::get('region/create', 'Admin\RegionController@create')->name('admin-region-form-create');
    Route::post ('region/create', 'Admin\RegionController@store')->name('admin-region-create');

    # Delete Region
    Route::get('region/delete/{id}', 'Admin\RegionController@destroy')->name('admin-region-delete');

    # Localities List
    Route::get('localities', 'Admin\LocalityController@index');

    # Locality Edit
    Route::get('locality/edit/{id}', 'Admin\LocalityController@edit')->name('admin-locality-edit');
    Route::post('locality/edit/{id}', 'Admin\LocalityController@update')->name('admin-upd-locality');

    # Create Locality
    Route::get('locality/create', 'Admin\LocalityController@create')->name('admin-locality-form-create');
    Route::post ('locality/create', 'Admin\LocalityController@store')->name('admin-locality-create');

    # Delete Locality
    Route::get('locality/delete/{id}', 'Admin\LocalityController@destroy')->name('admin-locality-delete');

});


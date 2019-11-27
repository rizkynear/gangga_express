<?php

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes(['register' => false, 'reset' => false]);

Route::group(['middleware' => 'auth', 'namespace' => 'Admin'], function() {
    Route::get('/', function() {
        return redirect('admin/dashboard');
    });

    Route::prefix('dashboard')->group(function() {
        Route::get('/', 'DashboardController@index')->name('dashboard');

        Route::group(['prefix' => 'slider', 'as' => 'slider.'], function() {
            Route::post('store', 'DashboardController@sliderStore')->name('store');
            Route::post('edit', 'DashboardController@sliderEdit')->name('edit');
            Route::post('delete', 'DashboardController@sliderDelete')->name('delete');
            Route::post('up', 'DashboardController@sliderUp')->name('up');
            Route::post('down', 'DashboardController@sliderDown')->name('down');
        });

        Route::group(['prefix' => 'blog'], function() {
            Route::get('/', 'BlogController@index')->name('blog');
        });

        Route::group(['prefix' => 'about-us'], function() {
            // Route::get('our-boat', 'BoatController@index')->name('boat');
            Route::get('the-company', 'CompanyController@index')->name('company');
        });

        Route::group(['prefix' => 'destination'], function() {
            Route::get('/', 'DestinationController@index');
        });
    });
});
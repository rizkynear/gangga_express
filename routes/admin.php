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
        Route::get('/', 'DashboardController@index');

        Route::group(['prefix' => 'blog'], function() {
            Route::get('/', 'BlogController@index')->name('blog');
        });

        Route::group(['prefix' => 'blog'], function() {
            Route::get('/', 'BlogController@index')->name('blog');
        });
    });
});
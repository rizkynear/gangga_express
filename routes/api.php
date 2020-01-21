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

Route::prefix('api/v1')->group(function() {
    Route::namespace('Api')->group(function() {
        Route::group(['prefix' => 'latest-blogs'], function() {
            Route::get('{total}', 'BlogController@latest');
        });
        
        Route::group(['prefix' => 'blogs'], function() {
            Route::get('/', 'BlogController@showAll');
            Route::get('{blog}', 'BlogController@showOne')->name('api.blog');
        });
        
        Route::group(['prefix' => 'second-sections'], function() { 
            Route::get('/', 'SecondSectionController@show');
        });
        
        Route::group(['prefix' => 'third-sections'], function() { 
            Route::get('/', 'ThirdSectionController@show');
        });
        
        Route::group(['prefix' => 'testimonials'], function() {
            Route::get('/', 'TestimonialController@showAll');
            Route::get('{testimonial}', 'TestimonialController@showOne');
        });
        
        Route::group(['prefix' => 'company-first-section'], function() {
            Route::get('/', 'CompanyFirstSectionController@show');
        });
        
        Route::group(['prefix' => 'company-second-section'], function() {
            Route::get('/', 'CompanySecondSectionController@show');
        });
        
        Route::group(['prefix' => 'destinations'], function() {
            Route::get('/', 'DestinationController@showAll');
            Route::get('{destination}', 'DestinationController@showOne');
        });
        
        Route::group(['prefix' => 'sliders'], function() {
            Route::get('/', 'SliderController@showAll');
            Route::get('{slider}', 'SliderController@showOne');
        });
        
        Route::group(['prefix' => 'boats'], function() {
            Route::get('/', 'BoatController@show');
        });
        
        Route::group(['prefix' => 'booking'], function() {
            Route::get('search/departure', 'BookingController@departure');
            Route::get('search/return', 'BookingController@return');
            Route::get('holiday', 'BookingController@holiday');
            Route::post('store', 'BookingController@store');
        });
        
        Route::group(['prefix' => 'contact'], function() {
            Route::post('store', 'ContactController@store');
        });
        
        Route::group(['prefix' => 'price'], function() {
            Route::get('domestic', 'PriceController@domestic');
            Route::get('foreigner', 'PriceController@foreigner');
            Route::get('total', 'PriceController@total');
        });
        
        Route::group(['prefix' => 'schedules'], function() {
            Route::get('/', 'ScheduleController@show');
        });
    });
});

Route::post('doku/notify', 'DokuController@notify')->name('doku.notify');
Route::post('doku/redirect', 'DokuController@redirect')->name('doku.redirect');
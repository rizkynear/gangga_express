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

Route::group(['prefix' => 'latest-blogs'], function() {
    Route::get('/', 'BlogController@latest');
});

Route::group(['prefix' => 'blogs'], function() {
    Route::get('/', 'BlogController@showAll');
    Route::get('{blog}', 'BlogController@showOne')->name('blog');
});

Route::group(['prefix' => 'second-sections'], function() { 
    Route::get('/', 'SecondSectionController@show');
});

Route::group(['prefix' => 'testimonials'], function() {
    Route::get('/', 'TestimonialController@showAll');
    Route::get('{testimonial}', 'TestimonialController@showOne');
});

Route::group(['prefix' => 'company'], function() {
    Route::get('/', 'CompanyController@show');
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
    Route::get('search', 'BookingController@search');
    Route::get('holiday', 'BookingController@holiday');
});
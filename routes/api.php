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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['prefix' => 'blogs'], function() {
    Route::get('/', 'BlogController@showAll');
    Route::get('{blog}', 'BlogController@showOne')->name('blog');
});

Route::group(['prefix' => 'second-sections'], function() { 
    Route::get('/', 'SecondSectionController@showAll');
    Route::get('{secondSection}', 'SecondSectionController@showOne');
});

Route::group(['prefix' => 'testimonials'], function() {
    Route::get('/', 'TestimonialController@showAll');
    Route::get('{testimonial}', 'TestimonialController@showOne');
});

Route::group(['prefix' => 'companies'], function() {
    Route::get('/', 'CompanyController@showAll');
    Route::get('{company}', 'CompanyController@showOne');
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
    Route::get('/', 'BoatController@showAll');
    Route::get('{boat}', 'BoatController@showOne');
});

Route::group(['prefix' => 'booking'], function() {
    Route::post('check-availability', 'BookingController@check');
});
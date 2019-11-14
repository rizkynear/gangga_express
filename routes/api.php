<?php

use App\Http\Models\Blog;
use App\Http\Models\Company;
use App\Http\Models\SecondSection;
use App\Http\Models\Testimonial;
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

Route::prefix((function() {
    $locale = request()->segment(3); // use third segment as locale
    
    return LaravelLocalization::setLocale($locale);
})())->group(function() {
    Route::prefix('blogs')->group(function () {
        Route::get('/', 'BlogController@showAll');
        Route::get('{blog}', 'BlogController@showOne');
    });

    Route::prefix('second-sections')->group(function() { 
        Route::get('/', 'SecondSectionController@showAll');
        Route::get('{secondSection}', 'SecondSectionController@showOne');
    });

    Route::prefix('testimonials')->group(function() {
        Route::get('/', 'TestimonialController@showAll');
        Route::get('{testimonial}', 'TestimonialController@showOne');
    });

    Route::prefix('companies')->group(function() {
        Route::get('/', 'CompanyController@showAll');
        Route::get('{company}', 'CompanyController@showOne');
    });
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

Route::get('create', function() {
    $data = [
        'name' => 'test',
        'nationality' => 'jepun',
        'image' => 'asd',
        'en' => ['description' => 'test'],
        'id' => ['description' => 'asd']
    ];

    Testimonial::create($data);

    return response()->json([
        // 'title' => $secondSection->translate('en')->title,
        // 'sub_title' => $secondSection->translate('en')->sub_title,
        // 'content' => $secondSection->translate('en')->content,
        // 'title_id' => $secondSection->translate('id')->title,
        // 'sub_title_id' => $secondSection->translate('id')->sub_title,
        // 'content_id' => $secondSection->translate('id')->content,
        'message' => 'sip masuk gan'
    ]);
});
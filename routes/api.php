<?php

use App\Http\Models\Blog;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'destinations'], function() {
    Route::get('/', 'DestinationController@showAll');
    Route::get('{destination}', 'DestinationController@showOne');
});

// Route::group(['prefix' => LaravelLocalization::setLocale()], function() {
//     // Route::group(['prefix' => 'blogs'], function() {
//         Route::get('blogs/', 'BlogController@showAll');
//         Route::get('blogs/{blog}', 'BlogController@showOne');
//     // });
// });

// Route::prefix((function() {
//     $locale = request()->segment(3);
//     return LaravelLocalization::setLocale($locale);
// }))->group((function() {
//     Route::get('blogs/', 'BlogController@showAll');
//     Route::get('blogs/{blog}', 'BlogController@showOne');
// }));

// Route::prefix('v1')->group(function() {
    
Route::prefix((function() {
    $locale = request()->segment(3); // use third segment as locale
    
    return LaravelLocalization::setLocale($locale);
})())->group(function() {
    Route::get('blogs/', 'BlogController@showAll');
    Route::get('blogs/{blog}', 'BlogController@showOne');
});

// Route::get('create', function() {
//     $data = [
//         'image' => 'test',
//         'en' => ['title' => 'test', 'description' => 'test'],
//         'id' => ['title' => 'asd', 'description' => 'asd'],
//     ];

//     $blog = Blog::create($data);

//     return response()->json([
//         'title' => $blog->translate('en')->title,
//         'description' => $blog->translate('en')->description,
//         'title_id' => $blog->translate('id')->title,
//         'description_id' => $blog->translate('id')->description,
//     ]);
// });

Route::group(['prefix' => 'testimonials'], function() {
    Route::get('/', 'TestimonialController@showAll');
    Route::get('{testimonial}', 'TestimonialController@showOne');
});

Route::group(['prefix' => 'second-sections'], function() {
    Route::get('/', 'SecondSectionController@showAll');
    Route::get('{secondSection}', 'SecondSectionController@showOne');
});

Route::group(['prefix' => 'sliders'], function() {
    Route::get('/', 'SliderController@showAll');
    Route::get('{slider}', 'SliderController@showOne');
});

Route::group(['prefix' => 'boats'], function() {
    Route::get('/', 'BoatController@showAll');
    Route::get('{boat}', 'BoatController@showOne');
});

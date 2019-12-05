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
    Route::get('/laravel-filemanager', '\UniSharp\LaravelFilemanager\Controllers\LfmController@show');
    Route::post('/laravel-filemanager/upload', '\UniSharp\LaravelFilemanager\Controllers\UploadController@upload');

    Route::post('notification', 'DashboardController@notification')->name('notification');
    
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

        Route::group(['prefix' => 'testimonial', 'as' => 'testimonial.'], function() {
            Route::post('store', 'DashboardController@testimonialStore')->name('store');
            Route::get('{id}/edit', 'DashboardController@testimonialEdit')->name('edit');
            Route::post('{id}/update', 'DashboardController@testimonialUpdate')->name('update');
            Route::post('delete', 'DashboardController@testimonialDelete')->name('delete');
        });

        Route::group(['prefix' => 'second-section', 'as' => 'second-section.'], function() {
            Route::post('save', 'DashboardController@secondSectionSave')->name('save');
            Route::post('edit-image', 'DashboardController@secondSectionEditImage')->name('edit-image');
        });

        Route::prefix('fasboat-schedule-route')->group(function() {
            Route::get('{route}', 'ScheduleController@index')->name('route');
            
            Route::group(['as' => 'schedule.', 'prefix' => '{route}'], function() {
                Route::post('store', 'ScheduleController@store')->name('store');
                Route::delete('{id}/delete', 'ScheduleController@delete')->name('delete');
                Route::get('{id}/edit', 'ScheduleController@edit')->name('edit');
                Route::patch('{id}/update', 'ScheduleController@update')->name('update');
            });
        });

        Route::prefix('fastboat-schedule-holiday')->group(function() {
            Route::get('holiday', 'HolidayController@index')->name('holiday');

            Route::group(['as' => 'holiday.', 'prefix' => 'holiday'], function() {
                Route::post('store', 'HolidayController@store')->name('store');
                Route::get('{id}/edit', 'HolidayController@edit')->name('edit');
                Route::patch('{id}/update', 'HolidayController@update')->name('update');
                Route::delete('{id}/delete', 'HolidayController@delete')->name('delete');
            });
        });

        Route::prefix('blog')->group(function() {
            Route::get('/', 'BlogController@index')->name('blog');

            Route::group(['as' => 'blog.'], function() {
                Route::get('add', 'BlogController@showAddForm')->name('add');
                Route::post('store', 'BlogController@store')->name('store');
                Route::delete('{id}/delete', 'BlogController@delete')->name('delete');
                Route::get('{id}/edit', 'BlogController@edit')->name('edit');
                Route::patch('{id}/update', 'BlogController@update')->name('update');
            });
        });

        Route::prefix('about-us')->group(function() {
            Route::get('our-boat', 'BoatController@index')->name('boat');
            
            Route::group(['prefix' => 'our-boat', 'as' => 'boat.'], function() {
                Route::post('store', 'BoatController@store')->name('store');
                Route::get('{id}/edit', 'BoatController@edit')->name('edit');
                Route::patch('{id}/update', 'BoatController@update')->name('update');
                Route::delete('{id}/delete', 'BoatController@delete')->name('delete');
            });

            Route::get('the-company', 'CompanyController@index')->name('company');

            Route::group(['prefix' => 'the-company', 'as' => 'company.'], function() {
                Route::post('save', 'CompanyController@save')->name('save');
            });
        });

        Route::prefix('destination')->group(function() {
            Route::get('/', 'DestinationController@index')->name('destination');

            Route::group(['as' => 'destination.'], function() {
                Route::get('add', 'DestinationController@add')->name('add');
                Route::post('store', 'DestinationController@store')->name('store');
                Route::delete('{id}/delete', 'DestinationController@delete')->name('delete');
                Route::get('{id}/edit', 'DestinationController@edit')->name('edit');
                Route::patch('{id}/update', 'DestinationController@update')->name('update');
            });
        });

        Route::prefix('contact')->group(function() {
            Route::get('/', 'ContactController@index')->name('contact');
        });

        Route::prefix('inquiry')->group(function() {
            Route::get('/', 'InquiryController@index')->name('inquiry');

            Route::group(['as' => 'inquiry.'], function() {
                Route::get('{id}/detail-passenger', 'InquiryController@detailPassenger')->name('detail-passenger');
                Route::get('{id}/detail-inquiry', 'InquiryController@detailInquiry')->name('detail-inquiry');
            });
        });
    });
});
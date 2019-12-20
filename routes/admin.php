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
            Route::post('store', 'DashboardSliderController@store')->name('store');
            Route::patch('{slider}/edit', 'DashboardSliderController@edit')->name('edit');
            Route::delete('{slider}/delete', 'DashboardSliderController@delete')->name('delete');
            Route::post('up', 'DashboardSliderController@up')->name('up');
            Route::post('down', 'DashboardSliderController@down')->name('down');
            Route::post('setCropBox', 'DashboardSliderController@setCropBox')->name('cropBox');
        });

        Route::group(['prefix' => 'testimonial', 'as' => 'testimonial.'], function() {
            Route::post('store', 'DashboardTestimonialController@store')->name('store');
            Route::get('{testimonial}/edit', 'DashboardTestimonialController@edit')->name('edit');
            Route::patch('{testimonial}/update', 'DashboardTestimonialController@update')->name('update');
            Route::delete('{testimonial}/delete', 'DashboardTestimonialController@delete')->name('delete');
            Route::post('setCropBox', 'DashboardTestimonialController@setCropBox')->name('cropBox');
        });

        Route::group(['prefix' => 'second-section', 'as' => 'second-section.'], function() {
            Route::post('save', 'DashboardSecondSectionController@save')->name('save');
            Route::post('edit-image', 'DashboardSecondSectionController@editImage')->name('edit-image');
            Route::post('setCropBox', 'DashboardSecondSectionController@setCropBox')->name('cropBox');
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
                Route::get('{holiday}/edit', 'HolidayController@edit')->name('edit');
                Route::patch('{holiday}/update', 'HolidayController@update')->name('update');
                Route::delete('{holiday}/delete', 'HolidayController@delete')->name('delete');
            });
        });

        Route::prefix('blog')->group(function() {
            Route::get('/', 'BlogController@index')->name('blog');

            Route::group(['as' => 'blog.'], function() {
                Route::get('add', 'BlogController@showAddForm')->name('add');
                Route::post('store', 'BlogController@store')->name('store');
                Route::delete('{blog}/delete', 'BlogController@delete')->name('delete');
                Route::get('{blog}/edit', 'BlogController@edit')->name('edit');
                Route::patch('{blog}/update', 'BlogController@update')->name('update');
                Route::post('setCropBox', 'BlogController@setCropBox')->name('cropBox');
            });
        });

        Route::prefix('about-us')->group(function() {
            Route::get('our-boat', 'BoatController@index')->name('boat');
            
            Route::group(['prefix' => 'our-boat', 'as' => 'boat.'], function() {
                Route::post('store', 'BoatController@store')->name('store');
                Route::get('{boat}/edit', 'BoatController@edit')->name('edit');
                Route::patch('{boat}/update', 'BoatController@update')->name('update');
                Route::delete('{boat}/delete', 'BoatController@delete')->name('delete');
                Route::post('setCropBox', 'BoatController@setCropBox')->name('cropBox');
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
                Route::delete('{destination}/delete', 'DestinationController@delete')->name('delete');
                Route::get('{destination}/edit', 'DestinationController@edit')->name('edit');
                Route::patch('{destination}/update', 'DestinationController@update')->name('update');
                Route::post('setCropBox', 'DestinationController@setCropBox')->name('cropBox');
            });
        });

        Route::prefix('contact')->group(function() {
            Route::get('/', 'ContactController@index')->name('contact');
            Route::get('search', 'ContactController@index')->name('contact.search');
            Route::delete('{contact}/delete', 'ContactController@delete')->name('contact.delete');
        });

        Route::prefix('inquiry')->group(function() {
            Route::get('/', 'InquiryController@index')->name('inquiry');

            Route::group(['as' => 'inquiry.'], function() {
                Route::get('{booking}/detail-passenger', 'InquiryController@detailPassenger')->name('detail-passenger');
                Route::get('{booking}/detail-inquiry', 'InquiryController@detailInquiry')->name('detail-inquiry');
                Route::delete('{booking}/delete', 'InquiryController@delete')->name('delete');
                Route::get('search', 'InquiryController@index')->name('search');
                Route::get('export', 'InquiryController@export')->name('export');
            });
        });

        Route::prefix('doku')->group(function() {
            Route::get('/', function() {
                return view('admin.doku.index');
            });

            Route::get('success', function() {
                return view('admin.doku.success');
            });

            Route::get('notify', 'DokuController@notify')->name('doku.notify');
        });
    });
});
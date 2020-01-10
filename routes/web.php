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

Route::get('/', function () {
    return view('welcome');
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
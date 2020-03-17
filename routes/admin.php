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

Route::prefix('dashboard')->name('dashboard.')->group(function () {


    Config::set('auth.defines', 'admin');
    Route::get('login', 'Dashboard\AdminAuthController@getLoginPage')->name('login');
    Route::post('login', 'Dashboard\AdminAuthController@login')->name('doLogin');
    Route::get('forgot/password', 'Dashboard\AdminAuthController@forgotPassword')->name('forgot');
    Route::post('forgot/password', 'Dashboard\AdminAuthController@submitForgotPassword')->name('submitForgot');
    Route::get('reset/password/{token}', 'Dashboard\AdminAuthController@resetPassword')->name('resetPassword');
    Route::post('reset/password/{token}', 'Dashboard\AdminAuthController@submitResetPassword')->name('submitResetPassword');

    Route::group(['middleware' => 'admin:admin'], function () {

        Route::any('logout', 'Dashboard\AdminAuthController@logout')->name('logout');
        Route::get('/index', 'Dashboard\SubCategoryController@index')->name('index');

        Route::resource('admins', 'Dashboard\AdminController');
        Route::get('profile', 'Dashboard\AdminController@profile')->name('profile');
        Route::put('/profile', 'Dashboard\AdminController@update')->name('updateProfile');




        Route::get('markets/index', 'Dashboard\SubCategoryController@index')->name('markets.index');
        Route::get('markets/create', 'Dashboard\SubCategoryController@create')->name('markets.create');
        Route::post('markets/store', 'Dashboard\SubCategoryController@store')->name('markets.store');
        Route::get('markets/edit/{subCategory}', 'Dashboard\SubCategoryController@edit')->name('markets.edit');
        Route::put('markets/update/{subCategory}', 'Dashboard\SubCategoryController@update')->name('markets.update');
        Route::delete('markets/destroy/{subCategory}', 'Dashboard\SubCategoryController@destroy')->name('markets.destroy');

        Route::get('notifications/create',  'Dashboard\NotificationController@create')->name('notifications.create');
        Route::POST('notifications/send',  'Dashboard\NotificationController@send')->name('notifications.send');

        Route::resource('categories', 'Dashboard\CategoryController');





    });
  });

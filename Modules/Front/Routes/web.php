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



Route::name('front.')->group(function () {
    Route::get('/', 'FrontController@index')->name('index');
    Route::get('about', 'FrontController@about')->name('about');
    Route::get('gallery', 'FrontController@gallery')->name('gallery');
    Route::get('contact', 'FrontController@contact')->name('contact');
    Route::post('contact-us-store', 'FrontController@contactUsStore')->name('contact-us-store');

    Route::middleware(['auth'])->group(function () {
        //Registrations
        Route::get('registrations/create', 'RegistrationController@create')->name('registrations.create');
        Route::post('registrations/store', 'RegistrationController@store')->name('registrations.store');
        Route::get('registrations/find-registration', 'RegistrationController@findRegistration')->name('registrations.registration-find');
        Route::any('registrations/show/detail', 'RegistrationController@showDetail')->name('registrations.show-detail');
        //Payment-details
        Route::any('payment-details/show', 'FrontController@paymentDetails')->name('payment_details.show');
    });
});
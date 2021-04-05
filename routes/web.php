<?php

use Illuminate\Support\Facades\Route;

Route::get('login', 'Auth\LoginController@showLogin')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.do');

Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('register', 'Auth\RegistrationController@showRegistration')->name('register');
Route::post('register', 'Auth\RegistrationController@register')->name('register.do');

Route::middleware([ 'auth' ])->group(function() {
    Route::get('/', 'HomeController@showHome')->name('home');

    Route::post('/user_details', 'HomeController@saveUserDetails')->name('user_details.do');


    Route::post('/address', 'HomeController@saveAddress')->name('save_address.do');
    Route::delete('/address/{addressId}', 'HomeController@deleteAddress')->name('delete_address.do');
});

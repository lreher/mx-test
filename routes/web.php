<?php

use Illuminate\Support\Facades\Route;

Route::get('login', 'Auth\LoginController@showLogin')->name('login');

Route::get('register', 'Auth\RegistrationController@showRegistration')->name('register');
Route::post('register', 'Auth\RegistrationController@register')->name('register.do');

Route::middleware([ 'auth' ])->group(function() {
    Route::get('/', function () {
        return view('index')->name('home');
    });
});

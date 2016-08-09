<?php

Route::get('/', function () {
    return view('welcome');
})->name('welcomePage');

Route::get('auth/login', ['uses' => 'Auth\AuthController@getLogin']);
Route::post('auth/login', ['uses' => 'Auth\AuthController@postLogin']);
Route::get('auth/logout', ['uses' => 'Auth\AuthController@getLogout', 'as' => 'logout']);

Route::get('dashboard',['as' => 'dashboard','uses' => 'Main\MainController@getView']);



Route::get('/registration', function () {
    return view('registration');
})->name('registration');


Route::post('/registrate', ['uses' => 'Registration\RegistrationController@processRegistrationRequest'])->name('registrate');
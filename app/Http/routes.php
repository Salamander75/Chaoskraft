<?php

Route::get('/', function () {
    return view('welcome');
})->name('welcomePage');

Route::get('auth/login', ['uses' => 'Auth\AuthController@getLogin']);
Route::post('auth/login', ['uses' => 'Auth\AuthController@postLogin']);
Route::get('auth/logout', ['uses' => 'Auth\AuthController@getLogout', 'as' => 'logout']);

// User command routes

Route::post('submit/command', ['uses' => 'Main\MainController@processUserCommands']);
Route::get('submit/command', [
    'as' => 'commandSubmit',
    'uses' => 'Main\MainController@processUserCommands',
    'middleware' => 'auth']);

Route::get('main',[
    'as' => 'main',
    'middleware' => 'auth',
    'uses' => 'Main\MainController@getView']);



Route::get('/registration', function () {
    return view('registration');
})->name('registration');


Route::post('/registrate', ['uses' => 'Registration\RegistrationController@processRegistrationRequest'])->name('registrate');
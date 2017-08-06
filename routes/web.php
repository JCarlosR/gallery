<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/facebook/login', 'FacebookLoginController@redirectToProvider');
Route::get('/facebook/callback', 'FacebookLoginController@handleProviderCallback');

Route::get('/twitter/login', 'TwitterLoginController@redirectToProvider');
Route::get('/twitter/callback', 'TwitterLoginController@handleProviderCallback');

Route::get('/google/login', 'GoogleLoginController@redirectToProvider');
Route::get('/google/callback', 'GoogleLoginController@handleProviderCallback');

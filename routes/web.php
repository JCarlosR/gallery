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

// Gallery
Route::get('/galleries/create', 'GalleryController@create');
Route::post('/galleries', 'GalleryController@store');
Route::get('/galleries/{id}', 'GalleryController@show');

// Photo
Route::post('/photos', 'PhotoController@store');
Route::get('/photos/{id}/edit', 'PhotoController@edit');
Route::post('/photos/{id}', 'PhotoController@update');
Route::get('/photos/{id}/delete', 'PhotoController@delete');

// Public access
Route::post('/photos/{id}/comments', 'CommentController@store');
Route::get('/@{username}/photos/{id}', 'Guest\PhotoController@show');
Route::get('/@{username}', 'Guest\ProfileController@show');

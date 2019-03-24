<?php

Route::name('api.v1.')->namespace('\App\Api\V1\Http\Controllers')->group(function() {
    Route::get('posts', 'PostController@index')->name('posts#index');
    Route::post('posts', 'PostController@create')->name('posts#create');
    Route::get('posts/{id}', 'PostController@show')->name('posts#show');
    Route::delete('posts/{id}', 'PostController@delete')->name('posts#delete');
    Route::get('posts/{post}/comments', 'PostController@comments')->name('posts#comments');
    Route::post('posts/{post}/comments', 'PostCommentController@create')->name('posts-comments#create');
    Route::delete('posts/{post}/comments/{comment}', 'PostCommentController@delete')->name('posts-comments#delete');

    Route::get('users', 'UserController@show')->name('users#show');
    Route::post('login', 'AuthController@login')->name('auth#login');
    Route::post('register', 'AuthController@register')->name('auth#register');
});
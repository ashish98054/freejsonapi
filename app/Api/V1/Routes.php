<?php

Route::name('api.v1.')->namespace('\App\Api\V1\Http\Controllers')->group(function() {
    Route::get('posts', 'PostController@index')->name('posts#index');
    Route::post('posts', 'PostController@create')->name('posts#create');
    Route::get('posts/{id}', 'PostController@show')->name('posts#show');
    Route::delete('posts/{id}', 'PostController@delete')->name('posts#delete');
    Route::get('posts/{id}/comments', 'PostController@comments')->name('posts#comments');

    Route::get('users', 'UserController@show')->name('users#show');
    Route::post('login', 'UserController@login')->name('login');
});
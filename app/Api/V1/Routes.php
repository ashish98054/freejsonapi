<?php

Route::namespace('\App\Api\V1\Http\Controllers')->group(function() {
    Route::post('posts', 'PostController@create')->name('posts#create');
    Route::get('posts/{id}', 'PostController@show')->name('posts#show');
    Route::delete('posts/{id}', 'PostController@delete')->name('posts#delete');
});
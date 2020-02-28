<?php

Route::group(['namespace' => 'Admin', 'as' => 'admin.'], function () {
    
    Route::group(['namespace' => 'Auth', 'as' => 'auth.'], function () {
        Route::get('/login', 'LoginController@showLoginForm')->name('login');
        Route::post('/login', 'LoginController@login');
        Route::get('/logout', 'LogoutController@logout')->name('logout');
    });

    Route::group(['middleware' => 'auth:admin'], function (){
        Route::get('/', 'HomeController@index')->name('index');
        Route::get('/index', 'HomeController@index')->name('index');

        Route::group(['namespace' => 'Category', 'as' => 'category.', 'prefix' => '/category'], function (){
            Route::get('/', 'CategoryController@index')->name('index');
            Route::get('/{category_id}/edit', 'CategoryController@edit')->name('edit');
            Route::post('/{category_id}/update', 'CategoryController@update')->name('update');
            Route::get('/create', 'CategoryController@create')->name('create');
            Route::post('/create', 'CategoryController@store');
            Route::get('/{category_id}/delete', 'CategoryController@destroy')->name('delete');
        });
    
        Route::group(['namespace' => 'Album', 'as' => 'album.', 'prefix' => '/album'], function (){
            Route::get('/', 'AlbumController@index')->name('index');
            Route::get('/{album_id}/edit', 'AlbumController@edit')->name('edit');
            Route::post('/{album_id}/update', 'AlbumController@update')->name('update');
            Route::get('/create', 'AlbumController@create')->name('create');
            Route::post('/create', 'AlbumController@store');
            Route::get('/{album_id}/delete', 'AlbumController@destroy')->name('delete');
        });

        Route::group(['namespace' => 'Song', 'as' => 'song.', 'prefix' => '/song'], function (){
            Route::get('/', 'SongController@index')->name('index');
            Route::get('/{song_id}/edit', 'SongController@edit')->name('edit');
            Route::post('/{song_id}/update', 'SongController@update')->name('update');
            Route::get('/create', 'SongController@create')->name('create');
            Route::post('/create', 'SongController@store');
            Route::get('/{song_id}/delete', 'SongController@destroy')->name('delete');
        });

        Route::group(['namespace' => 'Artist', 'as' => 'artist.', 'prefix' => '/artist'], function (){
            Route::get('/', 'ArtistController@index')->name('index');
            Route::get('/{artist_id}/edit', 'ArtistController@edit')->name('edit');
            Route::post('/{artist_id}/update', 'ArtistController@update')->name('update');
            Route::get('/create', 'ArtistController@create')->name('create');
            Route::post('/create', 'ArtistController@store');
            Route::get('/{artist_id}/delete', 'ArtistController@destroy')->name('delete');
        });

        Route::group(['namespace' => 'Lyric', 'as' => 'lyric.', 'prefix' => '/lyric'], function (){
            Route::get('/', 'LyricController@index')->name('index');
            Route::get('/{lyric_id}/edit', 'LyricController@edit')->name('edit');
            Route::post('/{lyric_id}/update', 'LyricController@update')->name('update');
        });
    });
});

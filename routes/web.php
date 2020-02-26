<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['namespace' => 'Auth'], function () {
    Route::get('/users/register', 'RegisterController@showRegistrationForm')->name('register');;
    Route::post('/users/register', 'RegisterController@register');
    Route::get('/users/login', 'LoginController@showLoginForm')->name('login');
    Route::post('/users/login', 'LoginController@login');
    Route::get('/users/logout', 'LogoutController@logout')->name('logout');
    Route::post('/user/{id}/change_pass', 'ChangePasswordController@change')->name('change_password');
    Route::get('/user/{id}/change_pass', 'ChangePasswordController@change1');
});

Route::group(['namespace' => 'Web'], function () {
    Route::get('/redirect/{social}', 'SocialController@redirect')->name('social_login');
    Route::get('/callback/{social}', 'SocialController@callback');

    Route::group(['middleware' => 'auth:web'], function () {
        Route::get('/', 'HomeController@index')->name('index');
        Route::get('/index', 'HomeController@index');
        Route::get('/search', 'HomeController@search')->name('search');

        Route::get('/category/{category_id}/show', 'CategoryController@show')->name('category.show');
        Route::get('/song/{song_id}/', 'SongController@listen')->name('song.listen');

        Route::group(['prefix' => '/artists', 'as' => 'artist.'], function () {
            Route::get('/', 'ArtistController@index')->name('index');
            Route::get('/{artist_id}/songs', 'ArtistController@songs')->name('songs');
        });

        Route::group(['prefix' => '/album', 'as' => 'album.'], function () {
            Route::get('/', 'AlbumController@index')->name('index');
            Route::get('/{album_id}/songs', 'AlbumController@songs')->name('songs');
        });

        Route::group(['prefix' => '/rate', 'as' => 'rate.'], function () {
            Route::post('/create', 'RateController@create')->name('create');
        });

        Route::group(['prefix' => '/lyric', 'as' => 'lyric.'], function () {
            Route::post('/create', 'LyricController@create')->name('create');
            Route::post('/{lyric_id}/update', 'LyricController@update')->name('update');
            Route::post('/{lyric_id}/delete', 'LyricController@delete')->name('delete');
        });

        Route::group(['prefix' => '/favourite', 'as' => 'favourite_list.'], function () {
            Route::post('/add', 'FavouriteController@add')->name('add');
            Route::post('/delete', 'FavouriteController@delete')->name('delete');
            Route::get('/', 'FavouriteController@index')->name('index');
        });

        Route::group(['prefix' => '/comment', 'as' => 'comment.'], function () {
            Route::post('/create', 'CommentController@create')->name('create');
            Route::post('/{comment_id}/delete', 'CommentController@delete')->name('delete');
            Route::post('/{comment_id}/update', 'CommentController@update')->name('update');
        });
    });
});

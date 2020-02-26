<?php

Route::group(['namespace' => 'Admin', 'as' => 'admin.'], function () {
    
    Route::group(['middleware' => 'auth:admin'], function (){
        Route::get('/', 'HomeController@index')->name('index');
        Route::get('/index', 'HomeController@index')->name('index');
    });
    
    Route::group(['namespace' => 'Auth', 'as' => 'auth.'], function () {
        Route::get('/login', 'LoginController@showLoginForm')->name('login');
        Route::post('/login', 'LoginController@login');
        Route::get('/logout', 'LogoutController@logout')->name('logout');
    });

    Route::group(['namespace' => 'Category', 'as' => 'category.', 'prefix' => '/category'], function (){
        Route::get('/', 'CategoryController@index')->name('index');
        Route::get('/{category_id}/edit', 'CategoryController@edit')->name('edit');
        Route::post('/{category_id}/update', 'CategoryController@update')->name('update');
        Route::get('/create', 'CategoryController@create')->name('create');
        Route::post('/create', 'CategoryController@store');
        Route::get('/{category_id}/delete', 'CategoryController@destroy')->name('delete');
    });

});

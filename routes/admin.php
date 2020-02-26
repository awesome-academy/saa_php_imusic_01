<?php

Route::group(['namespace' => 'Admin', 'as' => 'admin.'], function () {

    Route::get('/', 'HomeController@index')->name('index');
    Route::get('/index', 'HomeController@index')->name('index');

    Route::group(['namespace' => 'Auth'], function () {
    });
});

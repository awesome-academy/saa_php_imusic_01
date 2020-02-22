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

Route::get('/', function () {
    return view('web.master');
});
Route::group(['namespace'=>'Auth'], function(){
    Route::get('/users/register', 'RegisterController@showRegistrationForm')->name('register');;
    Route::post('/users/register', 'RegisterController@register');
    Route::get('/users/login', 'LoginController@showLoginForm')->name('login');
    Route::post('/users/login', 'LoginController@login');
    Route::get('/users/logout', 'LogoutController@logout')->name('logout');
    Route::post('/user/{id}/change_pass', 'ChangePasswordController@change')->name('change_password');
    Route::get('/user/{id}/change_pass', 'ChangePasswordController@change1');
});

Route::group(['namespace'=>'Web'], function(){
    Route::get('/redirect/{social}', 'SocialController@redirect')->name('social_login');
    Route::get('/callback/{social}', 'SocialController@callback');
});


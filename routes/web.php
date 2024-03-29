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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Authentication Routes...
		Route::get('admin/home', 'AdminController@index');
        Route::get('admin', 'Admin\LoginController@showLoginForm')->name('admin.login');
        Route::post('admin', 'Admin\LoginController@login');
        Route::post('logout', 'Auth\LoginController@logout')->name('logout');

        Route::get('admin-password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
        Route::post('admin-password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
        Route::get('admin-password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('admin.password.reset');
        Route::post('admin-password/reset', 'Auth\ResetPasswordController@reset')->name('admin.password.update');
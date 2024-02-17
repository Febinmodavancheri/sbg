<?php

use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return redirect('admin/login');
//});

Route::group(['namespace' => 'App\Http\Controllers\Admin'], function () {

    Route::group(['middleware' => ['ifNotAuth']], function () {

        Route::get('', 'LoginController@login')->name("login");

        Route::get('login', 'LoginController@login')->name("login");

        Route::post('login', 'LoginController@userLogin')->name("userLogin");

        Route::get('account-login', 'AccountLoginController@accountLogin')->name("account-login");

        Route::post('account-login', 'AccountLoginController@accountLoginPost')->name("account-login-post");
    });

    Route::group(['middleware' => ['ifAuth']], function () {

        Route::post('logout', 'LoginController@logout')->name("logout");

        Route::get('home', 'HomeController@home')->name("home");

        Route::get('account-home', 'HomeController@accountHome')->name("accountHome");

    });
});

<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::resource('category', 'CategoryController');
Route::resource('service', 'ServiceController');
Route::get( 'reservation/create', 'ReservationController@create');
Route::post( 'reservation', 'ReservationController@store');
//Route::get( 'category/create', 'CategoryController@create');
//Route::post( 'category/create', 'CategoryController@store');


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => 'setlanguage'
    ],
    function()
    {
        // HomeController
        Route::get( 'home',  [ 'as' => 'home',   'uses' => 'WelcomeController@Index' ] );
        Route::get( '/',         [ 'as' => 'home',   'uses' => 'WelcomeController@Index' ] );
        Route::get( 'about',  [ 'as' => 'about',   'uses' => 'HomeController@getAbout' ] );


        // SettingsController
        Route::get( 'set-language', [ 'as' => 'set-language', 'uses' => 'SettingsController@setLocale' ] );

        // AuthController
        Route::controllers([
            'auth'      => 'Auth\AuthController',
            'password'  => 'Auth\PasswordController',
        ]);
    }
);
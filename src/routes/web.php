<?php

use Illuminate\Support\Facades\Route;

use Modullo\ModulesEosSolution\Http\Controllers\ModulesEosSolutionController;

Route::group(['namespace' => 'Modullo\ModulesEosSolution\Http\Controllers', 'middleware' => ['web']], static function() {

    Route::group(['prefix' => 'developer','middleware' => ['auth']],function() {
        Route::get('dashboard','ModulesEosSolutionController@index')->name('dev-dashboard');
        Route::get('projects/{slug}','ModulesEosSolutionController@showProject');
    });

//    Route::group(['prefix' => 'admin','middleware' => ['guest']],function() {
//        Route::get('dashboard','ModulesEosSolutionController@admin')->name('login');
//    });

    Route::middleware('auth')->group(function () {
//        Route::get('logout','ModulesAuthController@logout')->name('logout');
//        Route::get('home','ModulesAuthController@index')->name('modullo.home');

    });

});
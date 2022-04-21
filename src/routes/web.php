<?php

use Illuminate\Support\Facades\Route;

use Modullo\ModulesEosSolution\Http\Controllers\ModulesEosSolutionController;

Route::group(['namespace' => 'Modullo\ModulesEosSolution\Http\Controllers', 'middleware' => ['web']], static function() {

    Route::group(['prefix' => 'developer','middleware' => ['auth','developer']],function() {
        Route::get('dashboard','ModulesEosSolutionController@index')->name('developer-dashboard');
        Route::get('projects/{slug}','ModulesEosSolutionController@showProject');
        Route::post('submit-solution','ModulesEosSolutionController@submitSolution')->name('submit.soln');
        Route::post('indicate-interest','ModulesEosSolutionController@interest')->name('interest');
        Route::get('my-solution','ModulesEosSolutionController@mySolution');
        Route::get('profile','ModulesEosSolutionController@profile');
    });

    Route::group(['prefix' => 'admin','middleware' => ['auth','admin']],function() {
        Route::get('dashboard','ModulesEosSolutionController@admin')->name('admin-dashboard');
        Route::group(['prefix' => 'solution'], function () {
            Route::get('','ModulesEosSolutionController@solution');
            Route::get('create','ModulesEosSolutionController@createSolution');
            Route::get('submission','ModulesEosSolutionController@submission');
            Route::put('submission','ModulesEosSolutionController@updateSubmission')->name('submission.status');
            Route::get('edit/{id}','ModulesEosSolutionController@editSolution');
            Route::get('create/cycle','ModulesEosSolutionController@createSolutionCycle');
            Route::post('create/cycle','ModulesEosSolutionController@storeSolutionCycle')->name('cycle-create');
            Route::post('','ModulesEosSolutionController@storeSolution')->name('ckeditor.image-upload');
            Route::put('publish-solution/{id}','ModulesEosSolutionController@publishSolution')->name('publish');
            Route::patch('','ModulesEosSolutionController@updateSolution')->name('update.soln');
        });
    });

    Route::middleware('auth')->group(function () {
//        Route::get('logout','ModulesAuthController@logout')->name('logout');
//        Route::get('home','ModulesAuthController@index')->name('modullo.home');

    });

});
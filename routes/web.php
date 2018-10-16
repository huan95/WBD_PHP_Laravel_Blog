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

Route::prefix('information')->group(function () {
    Route::get('home', function () {
        return view('welcome');
    })->name('home_list');

    Route::get('index','InformationController@index')->name('information_index');
    Route::get('add', 'InformationController@create')->name('information_add');
    Route::post('add','InformationController@store')->name('add');
    Route::get('{id}/delete', 'InformationController@delete')->name('information_delete');
    Route::get('{id}/update', 'InformationController@edit')->name('information_update');
    Route::post('{id}/update', 'InformationController@update')->name('update');
    Route::get('{id}/index', 'InformationController@show')->name('show');

});
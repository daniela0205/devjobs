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



Auth::routes(['verify'=>true]);



Route::group(['middleware' => ['auth','verified']], function () {
    //Positions
    Route::get('/positions', 'PositionController@index')->name('positions.index');
    Route::get('/positions/create', 'PositionController@create')->name('positions.create');
    Route::post('/positions', 'PositionController@store')->name('positions.store');
    Route::delete('/positions/{position}', 'PositionController@destroy')->name('positions.destroy');
    Route::get('/positions/{position}/edit', 'PositionController@edit')->name('positions.edit');
    Route::put('/positions/{position}', 'PositionController@update')->name('positions.update');

    //Upload imagen
    Route::post('/positions/imagen', 'PositionController@imagen')->name('positions.imagen');
    Route::post('/positions/deletimagen', 'PositionController@deletimagen')->name('positions.delet');

    // change statu position
    Route::post('/positions/{position}', 'PositionController@state')->name('positions.state');

    //Notifications

    Route::get('/notifications', 'NotificationsController')->name('notifications');



});

// Index page

Route::get('/', 'IndexController')->name('index');

//Category
Route::get('/categories/{category}', 'CategoryController@show')->name('categories.show');

// send aplicant data
Route::get('/applicants/{id}', 'ApplicantController@index')->name('applicants.index');
Route::post('/applicants/store', 'ApplicantController@store')->name('applicants.store');



//Vacancies Public
Route::get('/searching/search','PositionController@results')->name('positions.results');
Route::post('/searching/search','PositionController@search')->name('positions.search');
Route::get('/positions/{position}', 'PositionController@show')->name('positions.show');






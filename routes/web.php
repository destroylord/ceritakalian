<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Auth::routes();
Route::get('/dashboard', 'HomeController@index')->name('home');

Route::group(['prefix' => 'story' , 'middleware' => 'auth'], function () {
    Route::get('my-stories', 'StoryController@index')->name('stories.index');
    Route::get('create', 'StoryController@create')->name('stories.create');
    Route::post('store', 'StoryController@store');
    Route::get('{story:slug}/edit','StoryController@edit');
});


Route::get('/', function () {
    return view('welcome');
});



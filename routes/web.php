<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Auth::routes();
Route::get('/dashboard', 'HomeController@index')->name('home');

Route::group(['prefix' => 'story' , 'middleware' => 'auth'], function () {
    Route::get('my-stories', 'StoryController@index');
    Route::get('create', 'StoryController@create');
});


Route::get('/', function () {
    return view('welcome');
});



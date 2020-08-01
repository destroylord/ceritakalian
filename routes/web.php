<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Auth::routes();
Route::get('/dashboard', 'HomeController@index')->name('home');

// story
Route::group(['prefix' => 'story' , 'middleware' => 'auth'], function () {
    Route::get('{story:slug}/show', 'StoryController@show');
    Route::get('my-stories', 'StoryController@index')->name('stories.index');
    
    Route::get('create', 'StoryController@create')->name('stories.create');
    Route::post('store', 'StoryController@store');

    Route::get('{story:slug}/edit', 'StoryController@edit');
    Route::patch('{story:slug}/edit', 'StoryController@update');
    
    // softdeletes
    Route::delete('{story:slug}/delete','StoryController@destroy');
    // tong sampah
    Route::get('trash','StoryController@trash')->name('stories.trash');
});


Route::get('/', function () {
    return view('welcome');
});



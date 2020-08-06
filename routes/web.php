<?php

use App\Story;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Auth::routes();
Route::get('/dashboard', 'HomeController@index')->name('home');

// Master
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

    // restore
    Route::get('{id}/restore','StoryController@restore');
    Route::get('restoreall','StoryController@restoreall');

    // hapus
    Route::get('{id}/deletebyOne','StoryController@deletebyOne');
    Route::get('deleteall','StoryController@deleteall');
});

// setting
Route::get('setting/profil','UserController@edit')->name('profil');
Route::patch('setting/profil','UserController@update');
// password
Route::get('setting/change-password','UserController@changePasswordForm')->name('setting.password');
Route::post('setting/changes-password','UserController@changePassword');

// filtering dari kategori
Route::get('categories/{category:slug}','CategoryController@show');
// filtering setiap tags
Route::get('tags/{tag:slug}','TagController@show');



Route::get('/','WelcomeController@index');
Route::get('story/{story:slug}','WelcomeController@show');



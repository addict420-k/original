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

Route::get('/', 'PostsController@index');
Route::get('/carbon', 'CarbonController@getIndex');

Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

Route::group(['middleware' => ['auth']], function(){
    Route::resource('users', 'UsersController', ['only' => ['index', 'show']]);
    
    Route::group(['prefix' => 'users/{id}'],function(){
       Route::get('favorites', 'UsersController@favorites')->name('users.favorites');
    });
    Route::group(['prefix' => 'posts/{id}'], function(){
       Route::post('favorite', 'FavoritesController@store')->name('favorites.favorite');
       Route::delete('unfavorite', 'FavoritesController@destroy')->name('favorites.unfavorite');
       Route::get('edit', 'PostsController@edit')->name('posts.edit');
       Route::put('edit', 'PostsController@update')->name('posts.update');
    });
    Route::resource('posts', 'PostsController');
    Route::get('posts', 'PostsController@top')->name('posts.top');
    Route::get('/profile-image', 'UserImageController@index')->name('profileImage.get');
    Route::post('/profile-image', 'UserImageController@store')->name('profileIimage.store');
    Route::get('/post-image', 'PostImageController@index')->name('postImage.get');
    Route::post('/post-image','PostImageController@store')->name('postImage.store');
    Route::post('/start-time', 'UsersController@start_time')->name('post.start_time');
});
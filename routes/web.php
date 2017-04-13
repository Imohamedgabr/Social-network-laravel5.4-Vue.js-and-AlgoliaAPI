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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return Auth::user()->hello();
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['middleware' => 'auth'], function(){
    Route::get('/profile/{slug}', [
        'uses' => 'ProfilesController@index',
        'as' => 'profile'
    ]);

    Route::get('/profile/edit/profile', [
        'uses' => 'ProfilesController@edit',
        'as' => 'profile.edit'
    ]);

    Route::post('/profile/update/profile', [
        'uses' => 'ProfilesController@update',
        'as' => 'profile.update'
    ]);

    Route::get('/check_relationship_status/{id}', [
        'uses' => 'FriendshipsController@check',
        'as' => 'check'
    ]);

    Route::get('/add_friend/{id}', [
        'uses' => 'FriendshipsController@add_friend',
        'as' => 'add_friend'
    ]);

    Route::get('/accept_friend/{id}', [
        'uses' => 'FriendshipsController@accept_friend',
        'as' => 'accept_friend'
    ]);

    Route::get('get_unread', function(){
        return Auth::user()->unreadNotifications;
    });

    Route::get('/notifications', [
        'uses' => 'HomeController@notifications',
        'as' => 'notifications'
    ]);

    Route::get('/feed', [
        'uses' => 'FeedsController@feed',
        'as' => 'feed'
    ]);

    Route::post('/create/post', [
        'uses' => 'PostsController@store'
    ]);

    Route::get('/get_auth_user_data', function(){
        return Auth::user();
    });

    Route::get('/like/{id}', [
        'uses' => 'LikesController@like'
    ]);

    Route::get('/unlike/{id}', [
        'uses' => 'LikesController@unlike'
    ]);

});
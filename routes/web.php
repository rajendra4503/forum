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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/forum', [
    'uses'=> 'ForumController@index',
    'as'  => 'forum'
]);

Route::get('auth/{provider}', 'SocialsController@redirectToProvider');

Route::get('auth/{provider}/callback','SocialsController@handleProviderCallback');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('channels','ChannelsController');

    Route::get('discussion/create/', [
        'uses' => 'DiscussionsController@create',
        'as' => 'discussions.create'
    ]);
    
    Route::post('discussions/store', [
        'uses' => 'DiscussionsController@store',
        'as' => 'discussions.store'
    ]);

    Route::get('discussion/{slug}', [
        'uses' => 'DiscussionsController@show',
        'as' => 'discussion'
    ]);

    Route::post('discussion/reply/{id}', [
        'uses' => 'DiscussionsController@reply',
        'as' => 'discussion.reply'
    ]);

    Route::get('reply/like/{id}',[
        'uses' => 'RepliesController@like',
        'as' => 'reply.like'
    ]);

    Route::get('reply/unlike/{id}',[
        'uses' => 'RepliesController@unlike',
        'as' => 'reply.unlike'
    ]);

});


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

Auth::routes();

Route::get('/blog', 'BlogController@index');
Route::get('/blog/new', 'BlogController@create')->middleware('auth');
Route::post('/blog/new', 'BlogController@update')->middleware('auth');

// Admin card editing
Route::get('/card/edit/{card_id}', 'CardController@edit')->middleware('auth');
Route::post('/card/edit/{card_id}', 'CardController@processEdit')->middleware('auth');

// Collections
Route::get('/collection', 'CollectionController@profile')->middleware('auth');
Route::post('/collection', 'CollectionController@update')->middleware('auth');

// Profile updating
Route::get('/profile', 'UserController@profile')->middleware('auth');
Route::post('/profile', 'UserController@updateProfile')->middleware('auth');

// Messaging
Route::group(['prefix' => 'messages'], function () {
    Route::get('/', ['as' => 'messages', 'uses' => 'MessagesController@index']);
    Route::get('create', ['as' => 'messages.create', 'uses' => 'MessagesController@create']);
    Route::post('/', ['as' => 'messages.store', 'uses' => 'MessagesController@store']);
    Route::get('{id}', ['as' => 'messages.show', 'uses' => 'MessagesController@show']);
    Route::put('{id}', ['as' => 'messages.update', 'uses' => 'MessagesController@update']);
});

// Cards
Route::post('/card/like', 'CardController@likeToggle');
Route::post('/card/description', 'DeckController@getCardDescription');
Route::get('/card/{card_id}', 'CardController@view');

// Searching
Route::get('/search', 'SearchController@index');
Route::post('/search', 'SearchController@search');
Route::post('/json', 'SearchController@json');

// Deckbuilding
$decks = function () {
    Route::post('/like', 'DeckController@likeToggle');
    Route::post('/{deck_id}/comment', 'DeckController@addComment');
    Route::post('/{deck_id}/comment/del/{comment_id}', 'DeckController@delComment');
    Route::post('/u/{deck_id}/edit', 'DeckController@processEdit')->middleware('auth');
    Route::post('/u/{deck_id}/delete', 'DeckController@processDelete')->middleware('auth');
    Route::post('/', 'DeckController@search');
    
    Route::get('/u/{deck_id}/edit', 'DeckController@edit')->middleware('auth');
    Route::get('/u', 'DeckController@index')->middleware('auth');
    Route::get('/{deck_id}', 'DeckController@view');
    Route::get('/', 'DeckController@search');
};
Route::group(['prefix' => 'decks'], $decks);
Route::group(['prefix' => 'd'], $decks);

// Public profile
Route::get('/u/{username}', 'UserController@publicProfile');

// Home view
Route::get('/', 'HomeController@index');

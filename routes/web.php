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

// Admin card editing
Route::get('/card/edit/{card_id}', 'HomeController@edit');
Route::post('/card/edit/{card_id}', 'HomeController@processEdit');

// Collections
Route::get('/collection', 'CollectionController@index');
Route::post('/collection/markfoil', 'CollectionController@markFoil');
Route::post('/collection/update', 'CollectionController@update');

// Profile updating
Route::get('/profile', 'UserController@profile');
Route::post('/profile', 'UserController@updateProfile');

// Messaging
Route::group(['prefix' => 'messages'], function () {
    Route::get('/', ['as' => 'messages', 'uses' => 'MessagesController@index']);
    Route::get('create', ['as' => 'messages.create', 'uses' => 'MessagesController@create']);
    Route::post('/', ['as' => 'messages.store', 'uses' => 'MessagesController@store']);
    Route::get('{id}', ['as' => 'messages.show', 'uses' => 'MessagesController@show']);
    Route::put('{id}', ['as' => 'messages.update', 'uses' => 'MessagesController@update']);
});

// Deckbuilding
Route::post('/decks/{deck_id}/edit', 'DeckController@processEdit');
Route::post('/decks/{deck_id}/delete', 'DeckController@processDelete');
Route::get('/decks/{deck_id}/edit', 'DeckController@edit');
Route::get('/decks/public', 'DeckController@publicDecks');
Route::get('/decks', 'DeckController@index');

// Public deck view
Route::get('/d/{deck_id}', 'DeckController@view');

// Public profile
Route::get('/u/{username}', 'UserController@publicProfile');

// Home view
Route::get('/', 'HomeController@index');

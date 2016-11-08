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

Route::get('/card/edit/{card_id}', 'HomeController@edit');
Route::post('/card/edit/{card_id}', 'HomeController@processEdit');

Route::get('/collection', 'CollectionController@index');
Route::post('/collection/markfoil', 'CollectionController@markFoil');
Route::post('/collection/update', 'CollectionController@update');

Route::get('/profile', 'UserController@profile');
Route::get('/u/{username}', 'UserController@publicProfile');

Route::post('/decks/{deck_id}/edit', 'DeckController@processEdit');
Route::post('/decks/{deck_id}/delete', 'DeckController@processDelete');

Route::get('/decks/{deck_id}/edit', 'DeckController@edit');
Route::get('/decks/public', 'DeckController@publicDecks');
Route::get('/decks', 'DeckController@index');

Route::get('/d/{deck_id}', 'DeckController@view');

Route::get('/', 'HomeController@index');

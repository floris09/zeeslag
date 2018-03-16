<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/*=====================================GAME ROUTES================================= */

// List games
Route::get('games', 'GameController@index');
// List single game
Route::get('game/{id}', 'GameController@show');
// Create new game
Route::post('game', 'GameController@store');
// Update game
Route::put('game', 'GameController@store');
// Delete game
Route::delete('game/{id}', 'GameController@destroy');


/*=====================================PLAYER ROUTES================================= */

// List Players
Route::get('players', 'PlayerController@index');
// List single player
Route::get('player/{id}', 'PlayerController@show');
// Create new player
Route::post('player', 'PlayerController@store');
// Update player
Route::put('player', 'PlayerController@store');
// Delete player
Route::delete('player/{id}', 'PlayerController@destroy');



/*=====================================BOARD ROUTES================================= */
// List boards
Route::get('boards', 'BoardController@index');
// List single Board
Route::get('board/{id}', 'BoardController@show');
// Create new Board
Route::post('board', 'BoardController@store');
// Update Board
Route::put('board', 'BoardController@store');
// Delete Board
Route::delete('board/{id}', 'BoardController@destroy');

/*=====================================SHIP ROUTES================================= */
// List ships
Route::get('ships', 'ShipController@index');
// List single Board
Route::get('ship/{id}', 'ShipController@show');
// Create new Board
Route::post('ship', 'ShipController@store');
// Update Board
Route::put('ship', 'ShipController@store');
// Delete Board
Route::delete('ship/{id}', 'ShipController@destroy');
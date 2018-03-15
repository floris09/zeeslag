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
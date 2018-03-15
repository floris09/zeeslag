<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Request;
// load in the module
use App\Game;
//load in the resource
use App\Http\Resources\Game as GameResource;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $games = Game::paginate(2);
        return GameResource::collection($games);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //check for put request. if its a put is. nneed to put in a game_id
        $game = $request->isMethod('put') ? Article::findOrFail($request->game_id) : new Game;
        $game->id = $request -> input('game_id');
        
        if($game -> save()){
            return new GameResource($game);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Get Game by id, the id comes from the route.
        $game = Game::findOrFail($id);
        //return game as resource
        return new GameResource($game);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    //Get Game by id, the id comes from the route.
        $game = Game::findOrFail($id);
//    deleting the game    
        if($game->delete()){
        return new GameResource($game);
        }
    }

}
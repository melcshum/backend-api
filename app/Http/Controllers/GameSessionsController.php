<?php

namespace App\Http\Controllers;

use App\GameSession;
use Illuminate\Http\Request;

class GameSessionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\GameSession  $game_session
     * @return \Illuminate\Http\Response
     */
    public function show(GameSession $game_session)
    {
        return view('gamesessions.show', compact('game_session'));

 }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\GameSession  $game_session
     * @return \Illuminate\Http\Response
     */
    public function edit(GameSession $game_session)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\GameSession  $game_session
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GameSession $game_session)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\GameSession  $game_session
     * @return \Illuminate\Http\Response
     */
    public function destroy(GameSession $game_session)
    {
        //
    }
}

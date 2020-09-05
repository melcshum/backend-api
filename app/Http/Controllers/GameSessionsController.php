<?php

namespace App\Http\Controllers;

use App\Interaction;
use App\GameSession;
use Illuminate\Database\Eloquent\Model;
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
        $interactions =  $this->getInteractions($game_session->id);

        return view('gamesessions.show', compact('game_session', 'interactions'));
    }

    public function getInteractions($interaction_id)
    {
        $interactions = Interaction::with([
            'interaction_actor',
            'interaction_action',
            'interaction_object',
            'interaction_object.interaction_definition',
            'interaction_object.difficulty_settings',
            'interaction_result',
            'interaction_result.interaction_extensions',
            'game_session'
        ])
            ->where('game_session_id', '=', $interaction_id)
            //        ->where('type', '=', 'GameObject')
            //->get()
            ->paginate(20);

        //  ->groupby('action_name')
        return $interactions;
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

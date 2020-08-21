<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interaction;

class ExperienceController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {


        // $interactions = App\Interaction::all()->groupBy('interaction_action.name');
        $interactions = Interaction::with(
            [
                'interaction_actor',
                'interaction_action',
                'interaction_object',
                'interaction_object.interaction_definition',
                'interaction_result',
                'interaction_result.interaction_extensions',
                'game_session'
            ]
        )->paginate(20);
        return view('gamesessiondatas.index', compact('interactions'));
    }
}

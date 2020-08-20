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
        )->all()->groupBy('interaction_action.name');

        var_dump($interactions);
        return view('gamedatas.index', compact('interactions'));
    }
}

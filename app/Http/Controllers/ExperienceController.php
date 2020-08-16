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
        $interactions = Interaction::with(
            [
                'interaction_actor',
                'interaction_action',
                'interaction_object',
                'interaction_object.interaction_defintion',
                'interaction_result',
                'interaction_result.interaction_extensions'
            ]
        )->get();

        return view('gamedatas.index', compact('interactions'));
    }
}

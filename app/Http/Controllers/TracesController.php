<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\InteractionDefinition;

class TracesController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {

        $iDefinitions = InteractionDefinition
            ::with(['interaction_object', 'interaction_object.difficulty_settings'])->paginate(5);


        return view("traces.index", compact('iDefinitions'));
    }
}

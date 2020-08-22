<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Interaction;
use App\InteractionDefinition;



class GameDataController extends BaseController
{
    public function getSessionDefintionCount($sid)
    {
        // $result = Interaction
        //     ::where('game_session_id', '=', $sid)
        //     ->get()
        //     ->groupby('definition_name');
        // $data = array();
        // foreach ($result as $key => $value) {
        //     array_push($data, ['name' => $key, 'count' => count($value)]);
        // }
        // return $data;

        return InteractionDefinition::where('game_session_id', '=', $sid)->get()->groupby('name',true)->map->count();
    }

    public function getGameDefintionCount()
    {
        return InteractionDefinition::get()->groupby('name')->map->count();
    }
}

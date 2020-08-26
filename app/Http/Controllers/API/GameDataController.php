<?php

namespace App\Http\Controllers\API;

use App\GameSession;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Interaction;
// use App\InteractionActor;
// use App\InteractionAction;
// use App\InteractionObject;
use App\InteractionDefinition;
// use App\InteractionResult;
// use App\InteractionExtension;
// use App\Game;
// use App\User;
// use App\Profile;
use App\Http\Resources\InteractionResource;
use App\Http\Resources\GameSessionResource;
use Illuminate\Support\Str;


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

        return InteractionDefinition::where('game_session_id', '=', $sid)->get()->groupby('name', true)->map->count();
    }

    public function getGameDefintionCount()
    {
        return InteractionDefinition::get()->groupby('name')->map->count();
    }


    public function traceEvents($type)
    {

        if (!($type === "accessible"  ||
            $type === "alternative" ||
            $type === "completable" ||
            $type === "gameobject")) {
            return   $this->sendError('event  NOT FOUND');
        }

        $interactions = Interaction::with(
            [
                'interaction_actor',
                'interaction_action',
                'interaction_object',
                'interaction_object.interaction_definition',
                'interaction_result',
                'interaction_result.interaction_extensions'
            ]
        )->where('type', '=', $type)
            ->get();


        return  $this->sendResponse(
            InteractionResource::collection($interactions),
            "Interaction retrieved successfully."
        );
    }

    public function sessiontrace($sessionid, $type)
    {

        dd($sessionid . ": " . $type);
    }
}

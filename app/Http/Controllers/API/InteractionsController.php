<?php

namespace App\Http\Controllers\API;

use App\DifficultySetting;
use App\GameSession;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Interaction;
use App\InteractionActor;
use App\InteractionAction;
use App\InteractionObject;
use App\InteractionDefinition;
use App\InteractionResult;
use App\InteractionExtension;
use App\Game;
use App\User;
use App\Profile;
use App\Http\Resources\InteractionResource;
use App\Http\Resources\GameSessionResource;
use Illuminate\Support\Str;

class InteractionsController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // //$interactions= Interaction::with(['interaction_actor','interaction_action','interaction_object', 'interaction_result', 'interaction_extensions'])->get();
        // $interactions = Interaction::with(
        //     [
        //         'interaction_actor',
        //         'interaction_action',
        //         'interaction_object',
        //         'interaction_object.interaction_definition',
        //         'interaction_result',
        //         'interaction_result.interaction_extensions',
        //         'game_session'
        //     ]
        // )->get();

        $interactions = Interaction::with(
            [
                'interaction_actor',
                'interaction_action',
                'interaction_object',
                'interaction_object.interaction_definition',
                'interaction_object.difficulty_settings',
                'interaction_result',
                'interaction_result.interaction_extensions',
                'game_session'
            ]
        )->paginate(50);

        return  $this->sendResponse(
            InteractionResource::collection($interactions),
            "Interactions retrieved successfully."
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $session_id =  $request->input('session_id');

        $gid = GameSession::where('session', '=', $session_id)->get()->first()->only('id')['id'];

        $interaction = new Interaction([
            'title' => $request->input('title'),
            'type' => $request->input('type'),
            'name' => $request->input('actor.name'),
            'game_session_id' => $gid,
        ]);

        $iActor = new InteractionActor(
            ['name' =>  $request->input('actor.name')]
        );

        $iAction = new InteractionAction(
            ['name' =>  $request->input('verb.name')]
        );

        $iObject = new InteractionObject(
            [
                'name' =>  $request->input('game_object.name'),
                'game_session_id' => $gid
            ]
        );
        $iDef = new InteractionDefinition(
            [
                'name' =>  $request->input('game_object.definition.name'),
                'game_session_id' => $gid
            ]
        );
        $scenario_difficulty = new DifficultySetting(
            [
                'rating' =>  $request->input('game_object.scenario_difficulty.rating'),
                'play_count' =>  $request->input('game_object.scenario_difficulty.play_count'),
                'k_factor' =>  $request->input('game_object.scenario_difficulty.k_factor'),
                'uncertainty' =>  $request->input('game_object.scenario_difficulty.uncertainty'),
                'type' => 'scenario_difficulty'
            ]
        );
        $player_difficulty = new DifficultySetting(
            [
                'rating' =>  $request->input('game_object.player_difficulty.rating'),
                'play_count' =>  $request->input('game_object.player_difficulty.play_count'),
                'k_factor' =>  $request->input('game_object.player_difficulty.k_factor'),
                'uncertainty' =>  $request->input('game_object.player_difficulty.uncertainty'),
                'type' => 'player_difficulty'
            ]
        );

        $iResult = new InteractionResult(
            ['name' =>  $request->input('result.name')]
        );

        $extenions = array();
        foreach ($request->input('result.extensions') as  $extenion) {
            array_push(
                $extenions,
                new InteractionExtension([
                    'name'  => $extenion['name'],
                    'value' => $extenion['value']
                ])
            );
        }


        // Begin a transaction
        DB::beginTransaction();
        // Open a try/catch block
        try {
            $interaction->save();
            $interaction->interaction_actor()->save($iActor);
            $interaction->interaction_action()->save($iAction);
            $interaction->interaction_object()->save($iObject);
            $iObject->interaction_definition()->save($iDef);
            $iObject->difficulty_settings()->save($scenario_difficulty);
            $iObject->difficulty_settings()->save($player_difficulty);

            $iObject->interaction_definition()->save($iDef);

            $interaction->interaction_result()->save($iResult)
                ->interaction_extensions()->saveMany($extenions);
        } catch (\Exception $e) {
            // An error occured; cancel the transaction...
            DB::rollback();
            // and throw the error again.
            throw $e;
        }
        // Commit the transaction
        DB::commit();

        return response(['Interaction' => new InteractionResource($interaction), 'message' => 'Created successfully'], 200);
    }




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $interactions = Interaction::with(
            [
                'interaction_actor',
                'interaction_action',
                'interaction_object',
                'interaction_object.interaction_definition',
                'interaction_result',
                'interaction_result.interaction_extensions'
            ]
        )->find('id', '=', $id)
            ->get();


        return  $this->sendResponse(
            InteractionResource::collection($interactions),
            "Interaction retrieved successfully."
        );
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
        //
    }
}

<?php

namespace App\Http\Controllers\API;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interaction;
use App\InteractionActor;
use App\InteractionAction;
use App\InteractionObject;
use App\InteractionDefintion;
use App\InteractionResult;
use App\InteractionExtension;


use App\Http\Resources\InteractionResource;
use Facade\FlareClient\Http\Response;

class InteractionsController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$interactions= Interaction::with(['interaction_actor','interaction_action','interaction_object', 'interaction_result', 'interaction_extensions'])->get();
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


        $interaction = new Interaction([
            'title' => $request->input('title'),
            'type' => $request->input('type'),
            'name' => $request->input('actor.name'),
        ]);

        $iActor = new InteractionActor(
            ['name' =>  $request->input('actor.name')]
        );

        $iAction = new InteractionAction(
            ['name' =>  $request->input('verb.name')]
        );

        $iObject = new InteractionObject(
            ['name' =>  $request->input('object.name')]
        );
        $iDef = new InteractionDefintion(
            ['name' =>  $request->input('object.definition.name')]
        );
        $iResult = new InteractionResult(
            ['name' =>  $request->input('result.name')]
        );

        $extenions = array();
        foreach ($request->input('result.extenions') as  $extenion) {
            array_push(
                $extenions,
                new InteractionExtension([
                    'name' =>  $extenion['name'],
                    'value' =>  $extenion['value']
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
            $interaction->interaction_object()->save($iObject)->interaction_defintion()->save($iDef);
            $interaction->interaction_result()->save($iResult)->interaction_extensions()->saveMany($extenions);
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

    public function traceEvents($type)
    {

        if (!($type === "accessible"  ||
                $type === "alternative" ||
                $type === "completable" ||
                $type === "gameobject")
        ) {
            return   $this->sendError('event  NOT FOUND');
        }

        $interactions = Interaction::with(
            [
                'interaction_actor',
                'interaction_action',
                'interaction_object',
                'interaction_object.interaction_defintion',
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
                'interaction_object.interaction_defintion',
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

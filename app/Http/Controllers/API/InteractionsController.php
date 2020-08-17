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
            "Products retrieved successfully."
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
            'title', 'type', 'name' => $request->input('actor.name'),
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

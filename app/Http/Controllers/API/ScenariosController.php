<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Scenario;
use App\Http\Resources\ScenarioResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ScenariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $scenarios = Scenario::all();
        return response(['scenario' => ScenarioResource::collection($scenarios), 'message' => 'Retrieved successfully'], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'Validation Error']);
        }

        $ceo = Scenario::create($data);

        return response(['scenario' => new ScenarioResource($ceo), 'message' => 'Created successfully'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Scenario  $scenario
     * @return \Illuminate\Http\Response
     */
    public function show(Scenario $scenario)
    {
        return response(['scenario' => new ScenarioResource($scenario), 'message' => 'Retrieved successfully'], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Scenario  $scenario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Scenario $scenario)
    {
        $scenario->update($request->all());

        return response(['scenario' => new ScenarioResource($scenario), 'message' => 'Retrieved successfully'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Scenario  $scenario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Scenario $scenario)
    {
        $scenario->delete();

        return response(['message' => 'Deleted']);
    }
}

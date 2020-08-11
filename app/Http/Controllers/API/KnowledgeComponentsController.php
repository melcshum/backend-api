<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\KnowledgeComponent;
use App\Http\Resources\KnowledgeComponentResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KnowledgeComponentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $kcs = KnowledgeComponent::all();
        return response(['knowledgeComponent' => KnowledgeComponentResource::collection($kcs), 'message' => 'Retrieved successfully'], 200);
    }

    public function create(){

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
            'card_prefab_name' => 'required|max:255'
        ]);

        if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'Validation Error']);
        }

        $ceo = KnowledgeComponent::create($data);

        return response(['knowledgeComponent' => new KnowledgeComponentResource($ceo), 'message' => 'Created successfully'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\KnowledgeComponent  $knowledgeComponent
     * @return \Illuminate\Http\Response
     */
    public function show(KnowledgeComponent $knowledgeComponent)
    {
        return response(['knowledgeComponent' => new KnowledgeComponentResource($knowledgeComponent), 'message' => 'Retrieved successfully'], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\KnowledgeComponent  $knowledgeComponent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KnowledgeComponent $knowledgeComponent)
    {
        $knowledgeComponent->update($request->all());

        return response(['knowledgeComponent' => new KnowledgeComponentResource($knowledgeComponent), 'message' => 'Retrieved successfully'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\KnowledgeComponent  $knowledgeComponent
     * @return \Illuminate\Http\Response
     */
    public function destroy(KnowledgeComponent $knowledgeComponent)
    {
        $knowledgeComponent->delete();

        return response(['message' => 'Deleted']);
    }
}

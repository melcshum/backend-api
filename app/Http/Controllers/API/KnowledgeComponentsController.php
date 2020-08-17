<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\KnowledgeComponent;
use App\Http\Resources\KnowledgeComponentResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KnowledgeComponentsController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $kcs = KnowledgeComponent::all();
        return  $this->sendResponse(KnowledgeComponentResource::collection($kcs), 'Retrieved successfully');
    }

    public function create()
    {
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
            $this->sendError('Validation Error',   $validator->errors());
        }

        $kc = KnowledgeComponent::create($data);

        return  $this->sendResponse(new KnowledgeComponentResource($kc), 'Created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\KnowledgeComponent  $knowledgeComponent
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $knowledgeComponent = knowledgeComponent::find($id);

        if (is_null($knowledgeComponent)) {
            return   $this->sendError('ITEM  NOT FOUND');
        }
        return  $this->sendResponse(new KnowledgeComponentResource($knowledgeComponent), 'Retrieved successfully');
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

        return  $this->sendResponse(new KnowledgeComponentResource($knowledgeComponent), 'Retrieved successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\KnowledgeComponent  $knowledgeComponent
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $knowledgeComponent = knowledgeComponent::find($id);

        if (is_null($knowledgeComponent)) {
            return   $this->sendError('ITEM  NOT FOUND');
        }
        $knowledgeComponent->delete();

        return response(['Deleted']);
    }
}

<?php

namespace App\Http\Controllers;

use App\KnowledgeComponent;
use Illuminate\Http\Request;

class KnowledgeComponentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $knowledgeComponents = KnowledgeComponent::latest()->paginate(5);

        return view('knowledgeComponents.index', compact('knowledgeComponents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $knowledgeComponent = new KnowledgeComponent();
        return view('knowledgeComponents.create', compact('knowledgeComponent'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'purpose' => 'required',
            'level' => 'required|numeric',
        ]);
        $show = KnowledgeComponent::create($validatedData);

        return redirect()->route('knowledgeComponents.index')->with('success', "Your Knowledge Component has been submitted");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\KnowledgeComponent  $knowledgeComponent
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $knowledgeComponent = KnowledgeComponent::findOrFail($id);
        return view("knowledgeComponents.show", compact('knowledgeComponent'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\KnowledgeComponent  $knowledgeComponent
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $knowledgeComponent = KnowledgeComponent::findOrFail($id);
        return view("knowledgeComponents.edit", compact('knowledgeComponent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\KnowledgeComponent  $knowledgeComponent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'purpose' => 'required',
            'level' => 'required|numeric',
        ]);
        KnowledgeComponent::whereId($id)->update($validatedData);

        return redirect('/knowledgeComponents')->with('success', 'Your Knowledge Component is successfully updated');
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
        return redirect()->route('knowledgeComponents.index')->with('success', "Your Knowledge Component has been deleted");

        // return redirect('/knowledgeComponents')->with('success', "Your Knowledge Component has been deleted.");


    }
}
